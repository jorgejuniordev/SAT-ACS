<?php

	if(isset($_POST['add']) && $_POST['add']!=""){
		$cidade = ucfirst(antiinjection($_POST['cidade']));
		$uf = strtoupper(antiinjection($_POST['uf']));
		if($cidade!="" && $uf!="" && !is_numeric($uf) && !is_numeric($cidade)){		
			$sel = mysqli_query(conexao(), "SELECT * FROM disponibilidade WHERE cidade='".$cidade."' AND uf='".$uf."'");
			$rel = mysqli_num_rows($sel);
			if($rel==0){
				mysqli_query(conexao(), "INSERT INTO disponibilidade (cidade, uf) VALUES ('".$cidade."','".$uf."')");
				$_SESSION['mensagem']='cidade';
				header("Location:?p=administrar&gerenciar=localidades");
			}else{
				echo '<script>toastr.info("Cidade já esta disponivel.");</script>';;
			}
		}else{
			echo '<script>toastr.error("Digite os campos corretamente.");</script>';;
		}
	}

	if(isset($_POST['exc']) && $_POST['exc']!=""){

		$id = antiinjection($_POST['exc']);
		if(($id!="") && (is_numeric($id))){
			$sel = mysqli_query(conexao(), "SELECT * FROM disponibilidade WHERE id='".$id."'");
			$rel = mysqli_num_rows($sel);
			if($rel==1){
				mysqli_query(conexao(), "DELETE FROM disponibilidade WHERE id='".$id."'");
				$_SESSION['mensagem']='cidadedelet';
				header("Location:?p=administrar&gerenciar=localidades");
			}else{
				echo '<script>toastr.error("Essa cidade não existe.");</script>';;
			}
		}else{
			echo '<script>toastr.error("Algo está errado.");</script>';;
		}
	}