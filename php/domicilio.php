<?php 
	
	if(verificarSupervisor($db)==2){  
		$sql = mysqli_query(conexao(), "SELECT * FROM domicilio WHERE id_user='".$db['id']."'") or die();
		$res = mysqli_num_rows($sql);
		if($res>=1){
			echo "<h3><center>LISTA DE DOMICILIOS CRIADO POR VOCÊ: </center></h3>";

?>
<table class="table">
	<thead>
		<tr class="w3-red">
			<th>Id</th>
			<th>Código do Domicilio</th>
			<th>Código da Familia</th>
			<th>Nº de Individuos</th>
			<th>Telefone</th>
			<th>Cidade / UF</th>
			<th>Contas Cadastradas</th>
			<th>AÇÃO</th>
		</tr>
	</thead>
<?php
		while($row = mysqli_fetch_array($sql)){
			//$sqlpessoas = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE cod_familia='".$row['cod_familia']."'");
			//$result = mysqli_fetch_array($sqlpessoas);

			//$sqlpessoas = mysqli_query(conexao(), "SELECT * FROM domicilio WHERE cod_domicilio='".$result['cod_familia']."'");
			//$resultados = mysqli_num_rows($sqlpessoas);

			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['cod_domicilio']."</td>";
			echo "<td>".$row['cod_familia']."</td>";
			echo "<td>".$row['individuos']."</td>";
			echo "<td>(".$row['ddd'].") ".$row['telefone']."</td>";
			echo "<td><b>".$row['cidade']." / ".strtoupper($row['uf'])."</b></td>";
			echo "</tr>";
        }
?>
</table><br/>
<center>
<?php

		}else{
			echo "<h3>Nenhuma conta acs inativa em ".ucfirst($db['cidade'])." / ".mb_strtoupper($db['uf']).".</h3>";
		}
	
?>
</center>
<?php } ?>