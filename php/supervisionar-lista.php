<?php 
	if(isset($_GET['list'])){
		if($_GET['list']==1){
			include_once 'supervisionar-lista1.php';
		}elseif($_GET['list']==2){
			include_once 'supervisionar-lista2.php';
		}elseif($_GET['list']==3){
			include_once 'supervisionar-lista3.php';
		}elseif($_GET['list']==4){
			include_once 'supervisionar-lista4.php';
		}
	}else{
?>

<div class="divit"><a href="?p=supervisionar-lista&list=1&pg=0">Lista de Contas Invativas</a></div>
<div class="divit"><a href="?p=supervisionar-lista&list=2&pg=0">Lista de Contas Ativas</a></div>
<div class="divit"><a href="?p=supervisionar-lista&list=3&pg=0">Lista de Contas Bloqueadas</a></div>
<?php } ?>




<?php 
	if((isset($_GET['submit'])) && ($_GET['submit']=="search")){

	}

?>