<?php
  // REQUIRES
  require_once 'include/functions.php';
  require_once 'require/conexao.php';

  // COMMANDS
  if(isset($_POST['submit']) && $_POST['submit'] == 'Login'){
    $cpf = $_POST['cpf'];
    $senha = md5($_POST['senha']);
    $ip_ultimologin = $_SERVER['REMOTE_ADDR'];
    if($cpf == ""){
      $msg=Mensagem('errologin-1');
    }
    if($senha == ""){
      $msg=Mensagem('errologin-2');
    }
    if($cpf && $senha){
      $sql0 = "SELECT cpf FROM USUARIOS WHERE cpf='".antiinjection($cpf)."' AND senha!='".antiinjection($senha)."'";
      $sql1 = "SELECT id, nome, sobrenome, cpf FROM USUARIOS WHERE cpf='".antiinjection($cpf)."' AND senha='".antiinjection($senha)."'";
      $result0 = mysqli_query(conexao(),$sql0);
      $result1 = mysqli_query(conexao(),$sql1);
      $sess = mysqli_fetch_assoc($result1);
      $sql2 = "UPDATE USUARIOS SET ip_ultimologin='".$ip_ultimologin."' WHERE id='".$sess['id']."'";
      if(mysqli_num_rows($result1) > 0){
        session_start();
        mysqli_query(conexao(), $sql2);
        $fp = fopen("logs/".$sess['id'].".txt", "a");
        $escreve = fwrite($fp, " LOGIN|".$ip_ultimologin."|".date('Y-m-d')."|".date('H:i').PHP_EOL);
        fclose($fp); 
        setcookie("user", $sess['cpf'], time()+(86400 * 30), "/"); // 86400 = 1 day
        $_SESSION['mensagem']   = "login";
        $_SESSION['id']         = $sess['id'];
        $_SESSION['nome']       = $sess['nome'];
        $_SESSION['sobrenome']  = $sess['sobrenome'];
        $_SESSION['cpf']        = $sess['cpf'];
        retorno('home');
        exit();
      }elseif(mysqli_num_rows($result0) > 0){
        $msg=Mensagem('errologin-3');
      }else{
        $msg=Mensagem('errologin-4');
      }
    }
  }