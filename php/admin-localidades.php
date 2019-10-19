<?php 
	
	if(verificarSupervisor($db)==2){  
		$sql = mysqli_query(conexao(), "SELECT * FROM disponibilidade") or die();
		$res = mysqli_num_rows($sql);
		if($res>=1){
			echo "<h3><center>LISTA DE CIDADES ($res): </center></h3>";
			include_once 'require/add-localidade.php';

?>
<table class="table">
	<thead>
	<tr ><th>
		<form action="" method="POST">
			<input type="text" name="cidade" class="input2" maxlength="30" placeholder="Digite a Cidade"/>
			<input type="text" name="uf" class="input2" maxlength="2" placeholder="Digite o UF"/>
			<button type="submit" name="add" value="Adicionar" class="button btn-small green" type="button">Adicionar</button>
		</form>
	</th></tr>
</thead>

<table class="table">
	<thead>
		<tr class="w3-red">
			<th>Id</th>
			<th>Cidade</th>
			<th>UF</th>
			<th style="text-align: center;">Contas Cadastradas</th>
			<th style="text-align: center;">AÇÃO</th>
		</tr>
	</thead>
<?php
		while($row = mysqli_fetch_array($sql)){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['cidade']."</td>";
			echo "<td><b>".$row[ 'uf']."</b></td>";


		$sql3 = mysqli_query(conexao(), "SELECT id FROM usuarios WHERE cidade='".$row['cidade']."' AND uf='".$row['uf']."'");
		$res3 = mysqli_num_rows($sql3);

			echo "<td style=\"text-align:center;\"><b>".$res3."</b></td>";		
			echo "<td style=\"font-size: 11px;width: 30%;\"><center>";
		?>
		<form action="" method="POST">
			<center><button type="submit" name="exc" value="<?=$row['id'];?>" class="button btn-small2 red">Excluir</button></center>
		</form>

		<?php
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