<?php
	if(isset($_POST['ativar']) || isset($_POST['desativar']) || isset($_POST['bloquear'])){
		 $fp = fopen("logs/".$db['id'].".txt", "a");
		if(isset($_POST['ativar']) && $_POST['ativar']=="ativar"){
			mysqli_query(conexao(), "UPDATE usuarios SET status='ativa' WHERE cpf='".$cpf."'");
	        $escreve = fwrite($fp, $row["tipo_de_conta"]."|ATIVOU|".$row["id"]."|".date('Y-m-d')."|".date('H:i').PHP_EOL);
			$_SESSION['mensagem']   = "ativar";
		}

		if(isset($_POST['desativar']) && $_POST['desativar']=="desativar"){
			mysqli_query(conexao(), "UPDATE usuarios SET status='inativa' WHERE cpf='".$cpf."'");
			$escreve = fwrite($fp, $row["tipo_de_conta"]."|DESATIVOU|".$row["id"]."|".date('Y-m-d')."|".date('H:i').PHP_EOL);
			$_SESSION['mensagem']   = "desativar";
		}

		if(isset($_POST['bloquear']) && $_POST['bloquear']=="bloquear"){
			mysqli_query(conexao(), "UPDATE usuarios SET status='bloqueada' WHERE cpf='".$cpf."'");
			$escreve = fwrite($fp, $row["tipo_de_conta"]."|BLOQUEOU|".$row["id"]."|".date('Y-m-d')."|".date('H:i').PHP_EOL);
			$_SESSION['mensagem']   = "bloquear";
		}
		fclose($fp); 
		header("Location:?p=supervisionar-lista&list=4&cpf=$cpf&submit=search");
	}