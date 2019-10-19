<?php 
	if(isset($_GET['submit']) && $_GET['submit']=="search"){
		$cpf = $_GET['cpf'];
		if(is_numeric($cpf) && (strlen($cpf)==11)){
			if($cpf!=$db['cpf']){
				$sqll = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE cpf='".$cpf."' AND tipo_de_conta!='admin'") or die();
				$resultado = mysqli_num_rows($sqll);
				if($resultado == 1){
					include_once 'admin-cargos-view.php';
				}else{
					$_SESSION['mensagem']='erroradmin00';
					header("Location:?p=administrar&gerenciar=cargos&pg=0");
				}
			}else{
				$_SESSION['mensagem']='erroradmin01';
				header("Location:?p=administrar&gerenciar=cargos&pg=0");
			}
		}else{
			$_SESSION['mensagem']='erroradmin02';
			header("Location:?p=administrar&gerenciar=cargos&pg=0");
		}
	}else{
?>
<div class="str">
	<form id="form" accept-charset="utf-8" method="GET" action=""> 
	<input type="hidden" name="p" value="administrar"/> 
	<input type="hidden" name="gerenciar" value="cargos"/> 
	<input type="hidden" name="pg" value="<?=isset($pg) ? $pg : "0";?>"/> 
		<h1>Digite o cpf da conta</h1>
		<h3>Digite o cpf da pessoa procurada.</h3>
		<div class="div">
			<input type="text" class="input" value="" placeholder="Digite o CPF" maxlength="11" name="cpf" autocomplete="off" required/>
			<button class="button submit" type="submit" value="search" name="submit">Procurar</button>
		</div>
	</form>
</div>
<?php 
	if(isset($_GET["pg"])){
		$limite = 10;
		$pag = 0;
		$pg = $_GET["pg"];
		$cidade=$db['cidade'];
		$uf=$db['uf'];
		if(!$pg){ $pg = $pag;	}else{ $pg = $pg; }

		$sql2 = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE tipo_de_conta!='admin'") or die();
		$res2 = mysqli_num_rows($sql2);

		$sql = mysqli_query(conexao(), "SELECT * FROM usuarios WHERE tipo_de_conta!='admin'LIMIT $pg, $limite") or die();
		$res = mysqli_num_rows($sql);

		if($res>=1){
			echo "<h3><center>LISTA DE CONTAS</center></h3>";
			echo "<h4><center>Mostrando $res de $res2 - Página: ".(($pg/10)==0 ? 1 : ($pg/10)+1).".</center></h4>";

?>
<table class="table">
	<thead>
		<tr class="w3-red">
			<th>id</th>
			<th>Nome</th>
			<th>Cpf</th>
			<th>Status</th>
			<th>Cargo</th>
			<th>Cartão Sus</th>
			<th>Cidade/UF</th>
			<th>Data de Nascimento</th>
			<th>Data de Cadastro</th>
		</tr>
	</thead>
<?php
		while($row = mysqli_fetch_array($sql)){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['nome']." ".$row['sobrenome']."</td>";
			echo "<td>".$row['cpf']."</td>";
			echo "<td><b>".$row['status']."</b></td>";
			echo "<td><b>".$row['tipo_de_conta']."</b></td>";
			echo "<td>".$row['cartao_sus']."</td>";
			echo "<td>".$row['cidade']." / ".strtoupper($row['uf'])."</td>";
			echo "<td>".$row['data_nascimento']."</td>";
			echo "<td>".$row['data_cadastro']."</td>";
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
			echo "<a href=home.php?p=administrar&gerenciar=cargos&pg=0>
					<button class=\"button btn\" type=\"button\">Primeira</button>
				 </a>";
			echo "<a href=home.php?p=administrar&gerenciar=cargos&pg=$anterior>
					<button class=\"button btn\" type=\"button\">Anterior</button>
				 </a>";
		}

		$prox = $pg+$limite;
		if($prox>$res2){
			echo "<button class=\"button btn-off\" type=\"button\">Proxima</button>";
			echo "<button class=\"button btn-off\" type=\"button\">Ultima</button>";
		}else{
			echo "<a href=home.php?p=administrar&gerenciar=cargos&pg=$prox>
					<button class=\"button btn\" type=\"button\">Proxima</button>
				 </a>";

			echo "<a href=home.php?p=administrar&gerenciar=cargos&pg=$ultima>
					<button class=\"button btn\" type=\"button\">Ultima</button>
				 </a>";
		}
		}else{
			echo "<h3>Nenhuma conta acs ativa em ".ucfirst($db['cidade'])." / ".mb_strtoupper($db['uf']).".</h3>";
		}
	}
?>
</center>
<?php } ?>