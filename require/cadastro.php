<?php
    // REQUIRES
    require_once 'include/functions.php';
    require_once 'require/conexao.php';

    if(isset($_POST['cadastro']) && ($_POST['nome'] !='') && ($_POST['sobrenome'] !='') && ($_POST['cpf'] !='') && ($_POST['email'] !='') && ($_POST['senha-1'] !='') && ($_POST['senha-1'] !='')){
        $nome       =   strip_tags($_POST['nome']);
        $sobrenome  =   strip_tags($_POST['sobrenome']);
        $cpf        =   strip_tags($_POST['cpf']);
        $email      =   strip_tags($_POST['email']);
        $senha1     =   strip_tags($_POST['senha-1']);
        $senha2     =   strip_tags($_POST['senha-2']);
        $ip         =   $_SERVER['REMOTE_ADDR'];

        if($senha1 == $senha2){
            $sql = "SELECT * FROM USUARIOS WHERE cpf = '$cpf'";
            $res = mysqli_query(conexao(), $sql);
            if(mysqli_num_rows($res) == 0){
                if(is_numeric($cpf) && (strlen($cpf) == 11)){
                    $senha = md5($senha1);
                    $sql = "INSERT INTO USUARIOS(nome, sobrenome, cpf, email, senha, ip_cadastro) VALUES('".antiinjection($nome)."','".antiinjection($sobrenome)."','".antiinjection($cpf)."','".antiinjection($email)."','".antiinjection($senha)."', '".$ip."')";
                    $result = mysqli_query(conexao(), $sql);
                    if($result){
                        $sql1 = "SELECT nome, sobrenome, cpf FROM USUARIOS WHERE cpf='".antiinjection($cpf)."' AND senha=='".antiinjection($senha)."'";
                        $res1 = mysqli_query(conexao(), $sql1);
                        $sess = mysqli_fetch_assoc($res1);
                        retorno('loginregister');
                        exit();
                    }else{
                        $msg=Mensagem('errocadastro-1');
                    }

                }else{
                    $msg=Mensagem('errocadastro-2');
                }
            }else{
                $msg=Mensagem('errocadastro-3');
            }
        }else{
            $msg=Mensagem('errocadastro-4');
        }
    }

