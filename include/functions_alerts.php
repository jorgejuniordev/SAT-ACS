<?php 
  // REQUERIMENTOS E INCLUDES;
    include_once 'require/conexao.php';
    include_once 'include/functions.php';
    include_once 'include/functions_logon.php';
    include_once 'include/functions_pessoas.php';
    
	function lembretesAlerts($dbi){
		$sql = mysqli_query(conexao(), "SELECT * FROM lembretes WHERE id_usuario='$dbi' ");
		$rel = mysqli_num_rows($sql);
		return $rel;
	}

	