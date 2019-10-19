<?php

    // REQUIRES;
    require_once 'require/cadastro.php';
	
?>
<section class="signup">
	<div class="button-loginform">
		<a href="?p=login"><button class="a-button-login y">Login</button></a>
		<a href="?p=cadastro"><button class="a-button-regis n">Cadastro</button></a>
	</div>
	<form id="login-form" accept-charset="utf-8" method="post" action="?p=cadastro">
	<h1>Cadastro</h1>
	<div class="register-css-input">	
		<input type="text" value="" placeholder="Nome" tabindex="20" name="nome" autocomplete="off" required/>
		<input type="text" value="" placeholder="Sobrenome" tabindex="20" name="sobrenome" autocomplete="off" required/>
		<input type="text" value="" placeholder="CPF" tabindex="20" maxlength="11" name="cpf" autocomplete="off" required/>
		<input type="email" value="" placeholder="E-mail" tabindex="20" name="email" autocomplete="off" required/>
		<input type="password" value="" placeholder="Senha" tabindex="20" name="senha-1" autocomplete="off" required/>
		<input type="password" value="" placeholder="Confirmar Senha" tabindex="20" name="senha-2" autocomplete="off" required/>
		<button class="button submit" value="cadastro" name="cadastro" type="submit">Cadastre-se</button>
	</div>
	</form>
	<?php 
		// Mostrar Mensagens (de erros de login);
		if(isset($msg)){
			echo "<div class=\"msg_erro\">".$msg."</div>".PHP_EOL;
		}
	?>
</section>