<?php
	
	if(isset($_GET['ativar']) && $_GET['ativar']!=""){
		mysqli_query(conexao(), "UPDATE  USUARIOS SET tipo_de_conta='supervisor' WHERE cpf='".$_GET['cpf']."'");
		$_SESSION['mensagem']='successadmin03';
		header("Location:?p=administrar&gerenciar=cargos&pg=".$pg."&cpf=".$_GET['cpf']."&submit=search");
	}
	

	if(isset($_GET['desativar']) && $_GET['desativar']!=""){
		mysqli_query(conexao(), "UPDATE USUARIOS SET tipo_de_conta='acs' WHERE cpf='".$_GET['cpf']."'");
		$_SESSION['mensagem']='successadmin04';
		header("Location:?p=administrar&gerenciar=cargos&pg=".$pg."&cpf=".$_GET['cpf']."&submit=search");
	}