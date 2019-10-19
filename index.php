<?php

	// INICIALIZA SESSION;
    session_start();

    // REQUIRES;
    require_once 'require/conexao.php';
    require_once 'include/functions.php';

    // CHAMAR FUNÇÃO PARA VERIFICAR SESSION;
    VerificarSession(1);

?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title><?=titulo.tituloPage((isset($_GET['p']) ? ($_GET['p']) : ' - Login' ));?></title>
		<link rel="stylesheet" type="text/css" media="all" href="css/style_login.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/fonts.css">
	</head>
<body>
	<header class="global-header">
		<div>
			<nav class="global-nav">
				<div class="logo"></div>
			</nav>
		</div>
	</header>
	<?php 
		// RECEBER PÁGINAS;
		if(!isset($_GET['p'])){
		 	require_once('php/login.php');
		}else{
			switch($_GET['p']){
				case 'login': require_once('php/login.php'); break;
				case 'cadastro': require_once('php/cadastro.php'); break;
				case 'recuperar': require_once('php/recuperar.php'); break;
	           	default: require_once('php/login.php'); break;
	       	}
		}
		if(isset($_GET['msg'])){
			Mensagem($_GET['msg']);
		}
	?>

</body>
</html>
