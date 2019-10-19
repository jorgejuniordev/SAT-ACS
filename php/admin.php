<?php 
	if(verificarSupervisor($db)==2){  
		if(isset($_GET['gerenciar']) && $_GET['gerenciar']!=""){
			$getG = antiinjection($_GET['gerenciar']);
			if($getG == 'cargos'){
				include_once 'admin-cargos.php';
			}elseif($getG == 'localidades'){
				include_once 'admin-localidades.php';
			}else{
?>
<a href="?p=administrar&gerenciar=cargos&pg=0">
	<button class="button btn-small2 green" type="button">Gerenciar Cargos</button>
</a>

<a href="?p=administrar&gerenciar=localidades">
	<button class="button btn-small2 blue" type="button">Gerenciar Localidades</button>
</a>
<?php
			}
		}else{
?>
<a href="?p=administrar&gerenciar=cargos&pg=0">
	<button class="button btn-small2 green" type="button">Gerenciar Cargos</button>
</a>

<a href="?p=administrar&gerenciar=localidades">
	<button class="button btn-small2 blue" type="button">Gerenciar Localidades</button>
</a>
<?php 
		}
	}
?>