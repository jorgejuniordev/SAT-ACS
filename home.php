<?php

    // INICIALIZA SESSION;
    session_start();

    // REQUIRES;
    include_once 'require/conexao.php';
    include_once 'include/functions.php';
    include_once 'include/functions_logon.php';
    include_once 'include/functions_alerts.php';
    include_once 'include/functions_pessoas.php';

    // CHAMAR FUNÇÃO PARA VERIFICAR SESSION;
    VerificarSession(0);

    // VERIFICAR COOKIE;
    if(!isset($_COOKIE["user"])) {
        header("Location:?p=logout");
    }

    // DEFINIR DATA LOCAL;
    date_default_timezone_set('America/Sao_Paulo');

    // REMOVER NOTIFICAÇÕES;
    error_reporting(E_ALL ^ E_NOTICE)


?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title><?=strtoupper(titulo);?> - <?=isset($_GET['p']) ? ucfirst($_GET['p']) : "";?></title>
        <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/pure-min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/fonts.css">  
        <link rel="stylesheet" type="text/css" media="all" href="css/toastr.css">  
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/toastr.js"></script>


    </head>
<body>

<div id="layout">
    <?php 
        include_once 'php/alert.php';
        MensagemSession(); 
    ?>
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- icon -->
        <span></span>
    </a>
    
    <div id="menu">
        <div class="pure-menu">
            <div class="pure-menu-heading"><?=titulo;?></div>
            <ul class="pure-menu-list">
                <?php 
                // CHAMA O MENU;
                    if($db['tipo_de_conta']=='supervisor' || $db['tipo_de_conta']=='admin' && $db['status'] != 'bloqueada' && $db['status'] != 'inativa'){
                        include_once 'php/menusupervisor.php';
                    }else{
                        if($db['status']!='inativa' && $db['status']!='bloqueada'){
                            include_once 'php/menuacs.php';
                        }else{
                            include_once 'php/menublocked.php';
                        }
                    }
                ?>
            </ul>
        </div>
    </div>

     <div id="main">
            <div class="header">
                <h1><?=titulo;?></h1>
                <h2>Subtitulo bla bla bla</h2>
            </div>
            <div class="content">
                <?php 
                    // CHAMAS AS PÁGINAS DISPONIVEIS PARA HOME.PHP;
                    paginas($db);
                ?>
            </div>
        </div>
    </div>
    <!-- END; -->
    <script type="text/javascript">
        $(function(){
            $(".btn-toggle").click(function(e){
                e.preventDefault();
                el = $(this).data('element');
                $(el).toggle(400);
            });
        });
    </script>
</body>
</html>



