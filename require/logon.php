<?php
  
  require_once 'require/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
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
  <section class="login">
    <div class="button-loginform">
      <a href="login.html"><button class="a-button-login n">Login</button></a>
      <a href="cadastro.html"><button class="a-button-regis y">Cadastro</button></a>
    </div>
    <form id="login-form" accept-charset="utf-8" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <h1>Login</h1>
      <input type="text" value="" placeholder="CPF" tabindex="20" name="cpf" autocomplete="off" required/>
      <input type="password" placeholder="Senha" tabindex="21" name="senha" autocomplete="off" required/>
      <button class="button submit" type="submit" value="Login" name="submit">Login</button>
      <?php if(isset($msg)){echo $msg;} ?>
    </form>
    </br> 
  </section>
</body>
</html>
