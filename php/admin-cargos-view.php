<?php 
 if(isset($_GET["submit"]) && ($_GET['submit']=="search")){
	$cpf = antiinjection($_GET['cpf']);
	$succes = 0;
	if(isset($_GET['cpf']) && $_GET['cpf']!=""){
		if(is_numeric($cpf)){
			if(strlen($cpf) == 11){
				if($cpf != $db['cpf']){
					$succes = 1;
				}else{
					$error = "Este é seu cpf.";
				}
			}else{
				$error = "cpf deve conter 11 números.";
			}
		}else{
			$error = "cpf deve conter apenas números.";
		}
	}else{
		$error = "você não digitou o cpf.";
	}

	if($succes==1){
		$sql = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE cpf='$cpf' AND tipo_de_conta!='admin'") or die();
		$res = mysqli_num_rows($sql);
		while($row = mysqli_fetch_array($sql)){
		include_once 'require/add-cargo.php';
?>

	<form action="" method="get">
		<table class="table">
		<thead>
			<input type="hidden" name="p" value="administrar"/> 
			<input type="hidden" name="gerenciar" value="cargos"/> 
			<input type="hidden" name="pg" value="<?=$_GET['pg'];?>"/> 
			<input type="hidden" name="cpf" value="<?=$cpf;?>"/> 
			<?php if($row['tipo_de_conta']=="supervisor"){ ?>
			<button type="submit" class="button btn-small grey">Adicionar Supervisor</button>
			<?php }else{ ?>
			<button type="submit" value="ativar" name="ativar" class="button btn-small green">Adicionar Supervisor</button>
			<?php } ?>

			<?php if($row['tipo_de_conta']=="acs"){ ?>
			<button type="submit" class="button btn-small grey" type="button">Adicionar Acs</button>
			<?php }else{ ?>
			<button type="submit" value="desativar" name="desativar" class="button btn-small red">Adicionar Acs</button>
			<?php } ?>
			<input type="hidden" name="submit" value="search"/> 
		</thead>
		</table>
	</form>

	<table class="table">
		<thead>
		<tr class="w3-red">
			<td>Dados</td>
		</tr>
		</thead>
	</table>
	<table class="table">
		<tr>
			<td>Nome:</td>
			<td><input type="text" class="input" value="<?=$row['nome'];?>" readonly="true"/></td>

			<td>Sobrenome:</td>
			<td><input type="text" class="input" value="<?=$row['sobrenome'];?>" readonly="true"/></td>
		</tr>
		<tr>
			<td>Tipo de Conta:</td>
			<td><input type="text" class="input" value="<?=($row['tipo_de_conta']=='acs') ? 'Agente de Saúde' :$row['tipo_de_conta'];?>" readonly="true"/></td>

			<td>Status:</td>
			<td><input type="text" class="input" value="<?=$row['status'];?>" readonly="true"/></td>
		</tr>
		<tr>
			<td>Sexo:</td>
			<td><input type="text" class="input" value="<?=(isset($row['sexo']) || $row['sexi']=='') ? $row['sexo'] : 'Indefinido';?>" readonly="true"/></td>

			<td>CPF:</td>
			<td><input type="text" class="input" value="<?=isset($row['cpf']) ? $row['cpf'] : 'Indefinido';?>" readonly="true"/></td>
		</tr>
		<tr>
			<td>Cartão do SUS:</td>
			<td><input type="text" class="input" value="<?=(isset($row['cartao_sus']) ? $row['cartao_sus'] : 'Indefinido');?>" readonly="true"/></td>

			<td>Telefone:</td>
			<td><input type="text" class="input0" value="<?=isset($row['ddd']) ? $row['ddd'] : 'Indefinido';?>" readonly="true"/><input type="text" class="input3" value="<?=isset($row['telefone']) ? $row['telefone'] : 'Indefinido';?>" readonly="true"/></td>
		</tr>
		<tr>
			<td>Cidade/UF:</td>
			<td><input type="text" class="input" value="<?=(isset($row['cidade']) ? $row['cidade'] : 'cidade');?> / <?=(isset($row['uf']) ? strtoupper($row['uf']) : 'Indefinido');?>" readonly="true"/></td>
			
			<td>Data de Cadastro:</td>
			<td><input type="text" class="input" value="<?=(isset($row['data_cadastro']) ? $row['data_cadastro'] : 'Indefinido');?>" readonly="true"></td>
		</tr>
		<tr>
			<td>Data de Nascimento:</td>
			<td><input type="text" class="input" value="<?=(isset($row['data_nascimento']) ? $row['data_nascimento'] : 'Indefinido');?>" readonly="true"></td>

			<td>E-mail:</td>
			<td><input type="text" class="input" value="<?=(isset($row['email']) ? $row['email'] : 'Indefinido');?>" readonly="true"></td>
		</tr>
		<tr>
			<td>Ip de Cadastro:</td>
			<td><input type="text" class="input" value="<?=(isset($row['ip_cadastro']) ? $row['ip_cadastro'] : 'Indefinido');?>" readonly="true"></td>			

			<td>Ultimo Login (ip):</td>
			<td><input type="text" class="input" value="<?=(isset($row['ip_ultimologin']) ? $row['ip_ultimologin'] : 'Indefinido');?>" readonly="true"></td>
		</tr>
	</table>
</br>












<?php
}
   	if($res == 0){
   		echo "<h3>Nenhuma conta encontrada com esse cpf.</h3>";
   	}


	}else{
		echo "<h3>".$error."</h3>";
	}

?>
<?php }else{ ?>
<h4>Você não informou os dados corretamente.</h4>
<?php } ?>
</br><center>
<a href="home.php?p=administrar&gerenciar=cargos&pg=0"><button class="button btn" type="button">Voltar</button></a>
</center>