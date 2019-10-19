<?php 
	
	if(isset($_GET["pg"])){
		$dba = $db['id'];
		$limite = 30;
		$pag = 0;
		$pg = $_GET["pg"];
		if(!$pg){ $pg = $pag;	}else{ $pg = $pg; }

		$sql2 = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE id_user='$dba'") or die();
		$res2 = mysqli_num_rows($sql2);

		$sql = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE id_user='$dba' ORDER BY data_cadastro DESC LIMIT $pg, $limite") or die();
		$res = mysqli_num_rows($sql);

		if($res>=1){
			echo "<h3><center>LISTA DE PESSOAS ADICIONADAS POR VOCÊ: </center></h3>";




?>

<div class="div">
	<form id="form" accept-charset="utf-8" method="GET" action=""> 
	<input type="hidden" name="p" value="pessoas-editar"/> 
	<input type="hidden" name="pg" value="<?=isset($pg)?$pg:0;?>"/> 
		<h3>Digite o cartão do SUS da pessoa procurada.</h3>
		<div class="div2">
			<input type="text" class="input" value="" placeholder="Digite o cartão do SUS" maxlength="20" name="sus" autocomplete="off" required/>
			<button class="button submit" type="submit" value="search" name="submit">Procurar</button>
		</div>
	</form>
</div>
<table class="table">
	<thead>
		<tr class="w3-red">
			<th>Status</th>
			<th>Nome Completo</th>
			<th>Nome Social</th>
			<th>Idade</th>
			<th>Familia</th>
			<th>Cartão do Sus</th>
			<th>AÇÃO</th>
		</tr>
	</thead>
<?php
		while($row = mysqli_fetch_array($sql)){
			//$sqlpessoas = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE cod_familia='".$row['cod_familia']."'");
			//$result = mysqli_fetch_array($sqlpessoas);

			//$sqlpessoas = mysqli_query(conexao(), "SELECT * FROM domicilio WHERE cod_domicilio='".$result['cod_familia']."'");
			//$resultados = mysqli_num_rows($sqlpessoas);


			echo "<td>[".PessoasDados("saida_cadastro", $row['saida_cadastro'])."]</td>";
			echo "<td>".$row['nome_completo']."</td>";
			echo "<td>".$row['nome_social']."</td>";
			echo "<td>".calculo_idade($row['data_nascimento'])."</td>";
			echo "<td>".familia($row['cod_familia'])."</td>";
			echo "<td>".$row['cartao_sus']."</td>";
			echo "<td><a href=\"?p=pessoas-editar&pg=$pg&sus=".$row['cartao_sus']."&submit=search\">EDITAR<R/a></td>";
			echo "</tr>";
        }
?>
</table><br/>
<center>
<?php

		}else{
			echo "<h3>Nenhuma pessoa adicionada por você.</h3>";
		}
	
?>
</center>
<?php
		// inicio paginação
		$ultima = substr($res2,0,1)*10; // define o valor da ultima pagina
		$anterior = $pg-$limite; // define o valor da pagina anterior a atual
		echo "<center>";
		if($anterior<0){ // se anterior for menor que 0, ele exibe apenas os nomes sem link
			echo "<button class=\"button btn-off\" type=\"button\">Primeira</button>";
			echo "<button class=\"button btn-off\" type=\"button\">Anterior</button>";
		}else{ // senao ele exibe os links
			echo "<a href=home.php?p=pessoas&pg=0>
					<button class=\"button btn\" type=\"button\">Primeira</button>
				 </a>";
			echo "<a href=home.php?p=pessoas&pg=$anterior>
					<button class=\"button btn\" type=\"button\">Anterior</button>
				 </a>";
		}

		$prox = intval($pg+$limite);

		if($prox>$res2){
			echo "<button class=\"button btn-off\" type=\"button\">Proxima</button>";
			echo "<button class=\"button btn-off\" type=\"button\">Ultima</button>";
		}else{
			echo "<a href=home.php?p=pessoas&pg=$prox>
					<button class=\"button btn\" type=\"button\">Proxima</button>
				 </a>";

			echo "<a href=home.php?p=pessoas&pg=$ultima>
					<button class=\"button btn\" type=\"button\">Ultima</button>
				 </a>";
		}
		echo "</center>";
		}else{

?>
sem página
<?php } ?>
