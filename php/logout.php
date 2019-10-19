<?php
	include_once 'require/conexao.php';
	include_once 'include/functions.php';

	$fp = fopen("logs/".$db['id'].".txt", "a");
	$date1 = date('Y-m-d');
	$date2 = date('H:i');
    $escreve = fwrite($fp, "LOGOUT|".$_SERVER['REMOTE_ADDR']."|".$date1."|".$date2.PHP_EOL);
    fclose($fp); 
	session_start();
	session_unset();
	session_destroy();
	retorno('logoutsuccess');