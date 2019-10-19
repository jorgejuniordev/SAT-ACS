<?php 
	if(isset($_GET["pg"])){
		$limite = 10;
		$pag = 0;
		$pg = $_GET["pg"];
		$cidade=$db['cidade'];
		$uf=$db['uf'];
		if(!$pg){ $pg = $pag;	}else{ $pg = $pg; }

		$sql2 = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE status='inativa' AND tipo_de_conta='acs' AND cidade='$cidade' AND uf='$uf'") or die();
		$res2 = mysqli_num_rows($sql2);

		$sql = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE status='inativa' AND tipo_de_conta='acs' AND cidade='$cidade' AND uf='$uf' ORDER BY data_cadastro DESC LIMIT $pg, $limite") or die();
		$res = mysqli_num_rows($sql);

		if($res>=1){
			echo "<h3><center>LISTA DE CONTAS INATIVAS: ".ucfirst($db['cidade'])." / ".mb_strtoupper($db['uf'])."</center></h3>";
			echo "<h4><center>Encontrado $res de $res2 - Página: ".(($pg/10)==0 ? 1 : ($pg/10)+1).".</center></h4>";

?>
<table class="table">
	<thead>
		<tr class="w3-red">
			<th>Nome</th>
			<th>Cpf</th>
			<th>Status</th>
			<th>Cartão Sus</th>
			<th>Cidade/UF</th>
			<th>Data de Nascimento</th>
			<th>EDITAR</th>
		</tr>
	</thead>
<?php
		while($row = mysqli_fetch_array($sql)){
			echo "<tr>";
			echo "<td>".$row['nome']." ".$row['sobrenome']."</td>";
			echo "<td>".$row['cpf']."</td>";
			echo "<td><b>".$row['status']."</b></td>";
			echo "<td>".$row['cartao_sus']."</td>";
			echo "<td>".$row['cidade']." / ".strtoupper($row['uf'])."</td>";
			echo "<td>".$row['data_nascimento']."</td>";
			echo "<td><a href=\"?p=supervisionar-lista&list=4&cpf=".$row['cpf']."&submit=search\"><b>EDITAR</a></a></td>";
			echo "</tr>";
        }
?>
</table><br/>
<center>
<?php

		// inicio paginação
		$ultima = substr($res2,0,1)*10; // define o valor da ultima pagina
		$anterior = $pg-$limite; // define o valor da pagina anterior a atual

		if($anterior<0){ // se anterior for menor que 0, ele exibe apenas os nomes sem link
			echo "<button class=\"button btn-off\" type=\"button\">Primeira</button>";
			echo "<button class=\"button btn-off\" type=\"button\">Anterior</button>";
		}else{ // senao ele exibe os links
			echo "<a href=home.php?p=supervisionar-lista&list=1&pg=0>
					<button class=\"button btn\" type=\"button\">Primeira</button>
				 </a>";
			echo "<a href=home.php?p=supervisionar-lista&list=1&pg=$anterior>
					<button class=\"button btn\" type=\"button\">Anterior</button>
				 </a>";
		}

		$prox = intval($pg+$limite);
		if($prox>$res2){
			echo "<button class=\"button btn-off\" type=\"button\">Proxima</button>";
			echo "<button class=\"button btn-off\" type=\"button\">Ultima</button>";
		}else{
			echo "<a href=home.php?p=supervisionar-lista&list=1&pg=$prox>
					<button class=\"button btn\" type=\"button\">Proxima</button>
				 </a>";

			echo "<a href=home.php?p=supervisionar-lista&list=1&pg=$ultima>
					<button class=\"button btn\" type=\"button\">Ultima</button>
				 </a>";
		}
		}else{
			echo "<h3>Nenhuma conta acs inativa em ".ucfirst($db['cidade'])." / ".mb_strtoupper($db['uf']).".</h3>";
		}
	}
?>
</center>