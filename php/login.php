<?php

	// REQUIRES;
	require_once 'require/login.php';

?>
<section class="login">
	<div class="button-loginform">
		<a href="?p=login"><button class="a-button-login n">Login</button></a>
		<a href="?p=cadastro"><button class="a-button-regis y">Cadastro</button></a>
	</div>
	<form id="login-form" accept-charset="utf-8" method="post" action="?p=login">
	<h1>Login</h1>
	<div class="login-css-input">
		<input type="text" value="" placeholder="CPF" maxlength="11" name="cpf" autocomplete="off" required/>
		<input type="password" placeholder="Senha" name="senha" autocomplete="off" required/>
		<button class="button submit" type="submit" value="Login" name="submit">Login</button>
	</div>
	</form>
	<?php 
		// Mostrar Mensagens (de erros de login);
		if(isset($_GET['msg'])){
			switch ($_GET['msg']){
				case 'msgsuccessregister':
					echo "<div class=\"msg_succes\">".Mensagem($_GET['msg'])."</div>".PHP_EOL;
					break;
				
				case 'msgsuccesslogout':
					echo "<div class=\"msg_succes\">".Mensagem($_GET['msg'])."</div>".PHP_EOL;
					break;
				
				default:
					# code...
					break;
			}
		}

		if(isset($msg)){
			echo "<div class=\"msg_erro\">".$msg."</div>".PHP_EOL;
		}
	?>
</section>