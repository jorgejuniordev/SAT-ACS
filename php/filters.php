<?php 
	//iniciar o buffer
	ob_start();

	//pegar o conteudo do buffer, inserir na variavel e limpar a memoria
	$html = ob_get_clean();

	$html = utf8_encode($html);

	$html .= "
<style type=\"text/css\">
.tg  {border-collapse:collapse;border-spacing:0;width: 100%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#000;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#000}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-mb3i{background-color:#E9E9E9;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-6k2t{background-color:#E9E9E9;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class=\"tg\">
  <tr>
    <th class=\"tg-baqh\" colspan=\"6\">
      <h1><?=$filtro;?></h1>
      <h2 style=\"float: left;margin-left: 10px;\">ACS: ".ucfirst($db['nome'])."</h2>
      <h2 style=\"float: right;margin-right: 10px;\">Quantidade: (".$res.")</h2>
    </th>
  </tr>
  <tr>
    <td class=\"tg-6k2t\">Qtd.</td>
    <td class=\"tg-6k2t\">Nome:/ SUS:</td>
    <td class=\"tg-6k2t\">DN</td>
    <td class=\"tg-6k2t\">Ida.</td>
    <td class=\"tg-6k2t\">Mãe</td>
    <td class=\"tg-6k2t\">Rua</td>
    <td class=\"tg-6k2t\">Obs:</td>
  </tr>
<?php 
  if($res>=1){
    while($row = mysqli_fetch_array($sql)){
       \"<tr>\";
       \"<td class=\"tg-yw4l\">".$row['id']."</td>\";
       \"<td class=\"tg-yw4l\">".$row['nome_completo']."</br>".formatarCartaoSUS($row['cartao_sus'])."</td>\";
       \"<td class=\"tg-yw4l\">".date('d-m-Y', $row['data_nascimento'])."</td>\";
       \"<td class=\"tg-yw4l\">".retornarQuantidadeMes($row['data_nascimento'])." Mês</td>\";
       \"<td class=\"tg-yw4l\">".current( str_word_count(ucfirst($row['nome_mae']), 2))."</td>\";
       \"<td class=\"tg-yw4l\">SEI LA</td>\";
       \"<td class=\"tg-yw4l\">SEI LA</td>\";
       \"</tr>\";
    }

</table>

";


// incluir a classe MPDF
include('bibliotecas/mpdf60/mpdf.php');

//criar o objeto
$mpdf = new mPDF();

$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->WriteHTML($html);
$mpdf->Output('Meuped.pdf', 'D');
exit();

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
