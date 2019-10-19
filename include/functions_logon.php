 <?php
  
  // REQUERIMENTOS E INCLUDES;
    include_once 'require/conexao.php';
    include_once 'include/functions.php';
    include_once 'include/functions_logon.php';
    
    // CONECTAR AO BANCO DE DADOS COM A CONTA DO USUARIO;
    $sql = "SELECT * FROM USUARIOS WHERE nome='".antiinjection($_SESSION['nome'])."' AND sobrenome='".antiinjection($_SESSION['sobrenome'])."' AND cpf ='".antiinjection($_SESSION['cpf'])."'";
    $result = mysqli_query(conexao(), $sql);
    $db = mysqli_fetch_assoc($result);

    // VERIFICAR SE CONTA É SUPERVISOR;
    function verificarSupervisor($db){
      if($db['tipo_de_conta']=='admin'){
        return 2;
      }elseif($db['tipo_de_conta']=='supervisor'){
        return 1;
      }else{
        return 0;
      }

    }

    function paginas($db){
      if($db['status']=='inativa'){
        if(!isset($_GET['p'])){
          include_once('php/inativa.php');
        }else{
          switch($_GET['p']){
            case 'inativa': include_once('php/inativa.php'); break;
            case 'logout': include_once('php/logout.php'); break;
            case 'atualizar': include_once('php/atualizar.php'); break;
            default: include_once('php/inativa.php'); break;
          }
        }
      }elseif($db['status']=='bloqueada'){
        if(!isset($_GET['p'])){
          include_once('php/bloqueada.php');
        }else{
          switch($_GET['p']){
            case 'bloqueada': include_once('php/bloqueada.php'); break;
            case 'logout': include_once('php/logout.php'); break;;
            case 'atualizar': include_once('php/atualizar.php'); break;
            default: include_once('php/bloqueada.php'); break;
          }
        }
      }else{      
        if(!isset($_GET['p'])){
          include_once('php/home.php');
        }else{
          if(verificarSupervisor($db)==1){ 
            switch($_GET['p']){
              // ACS
              case 'home': include_once('php/home.php'); break;
              case 'atualizar': include_once('php/atualizar.php'); break;
              case 'logout': include_once('php/logout.php'); break;
              case 'sair': include_once('php/logout.php'); break;

              case 'domicilio': include_once ('php/domicilio.php'); break;
              case 'domicilio-criar': include_once ('php/domicilio-criar.php'); break;

              case 'pessoas': include_once('php/pessoas.php'); break;
              case 'pessoas-criar': include_once('php/pessoas-criar.php'); break;
              case 'pessoas-editar': include_once('php/pessoas-editar.php'); break;
              case 'notificacoes': include_once('php/notificacoes.php'); break;
              case 'filtros': include_once('php/filtros.php'); break;


              // SUPERVISOR
              case 'homesupervisor': include_once('php/homesupervisor.php'); break;
              case 'supervisionar': include_once('php/supervisionar.php'); break;
              case 'supervisionar-lista': include_once('php/supervisionar-lista.php'); break;

              default: include_once('php/home.php'); break;
            }
          }else{
            switch($_GET['p']){
              // ACS
              case 'home': include_once('php/home.php'); break;
              case 'atualizar': include_once('php/atualizar.php'); break;
              case 'logout': include_once('php/logout.php'); break;
              case 'sair': include_once('php/logout.php'); break;

              case 'domicilio': include_once ('php/domicilio.php'); break;
              case 'domicilio-criar': include_once ('php/domicilio-criar.php'); break;

              case 'pessoas': include_once('php/pessoas.php'); break;
              case 'pessoas-criar': include_once('php/pessoas-criar.php'); break;
              case 'pessoas-editar': include_once('php/pessoas-editar.php'); break;
              case 'notificacoes': include_once('php/notificacoes.php'); break;
              case 'filtros': include_once('php/filtros.php'); break;

              // SUPERVISOR
              case 'homesupervisor': include_once('php/homesupervisor.php'); break;
              case 'supervisionar': include_once('php/supervisionar.php'); break;
              case 'supervisionar-lista': include_once('php/supervisionar-lista.php'); break;

              //ADMIN
              case 'administrar': include_once('php/admin.php'); break;
              case 'administrar-list': include_once('php/admin.php'); break;
              default: include_once('php/home.php'); break;
            }
          }
        }  
      }
    }


    function mensagemReturn($mensagem){
      
    }
      
 