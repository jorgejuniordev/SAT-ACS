<?php

	// --- INCLUDES --- ///
    include_once './require/conexao.php';
    include_once './include/functions.php';
    include_once './include/functions_logon.php';

    // --- SQL CONTAS --- ///
    $quantidade = 20; // QUANTIDADE DE CONTAS A SEREM SELECIONADAS (SEMPRE = + 1);
	$result1 = mysqli_query(conexao(), "SELECT * FROM USUARIOS ORDER BY ID DESC LIMIT ".$quantidade);

	if(verificarSupervisor($db)>=1){ 

?>
	<div class="str">
		<form id="form" accept-charset="utf-8" method="get" action="?p=supervisionar">
			<input type="hidden" name="p" value="supervisionar-lista"/> 
			<input type="hidden" name="list" value="4"/> 
			<h1>Pesquisar conta</h1>
			<h3>Digite o cpf da pessoa procurada (em seu municipio).</h3>
			<div class="div">
				<input type="text" class="input" value="" placeholder="Digite o CPF" maxlength="11" name="cpf" autocomplete="off" required/>
				<button class="button submit" type="submit" value="search" name="submit">Procurar</button>
			</div>
		</form>
	</div>
<?php }else{} ?>