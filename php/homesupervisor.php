<?php

    include_once './require/conexao.php';
    include_once './include/functions.php';
    include_once './include/functions_logon.php';


    // --- SQL CONTAS --- ///
	$result1 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios`");
	$row1 = mysqli_fetch_assoc($result1);
	$count1 = $row1['count'];	

	$result2 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `tipo_de_conta` = 'acs'");
	$row2 = mysqli_fetch_assoc($result2);
	$count2 = $row2['count'];

	$result3 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `status` = 'ativa'");
	$row3 = mysqli_fetch_assoc($result3);
	$count3 = $row3['count'];

	$result4 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `status` = 'inativa'");
	$row4 = mysqli_fetch_assoc($result4);
	$count4 = $row4['count'];

	$result5 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `status` = 'bloqueada'");
	$row5 = mysqli_fetch_assoc($result5);
	$count5 = $row5['count'];

	$result6 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `sexo` = 'Masculino'");
	$row6 = mysqli_fetch_assoc($result6);
	$count6 = $row6['count'];

	$result7 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `sexo` = 'Feminino'");
	$row7 = mysqli_fetch_assoc($result7);
	$count7 = $row7['count'];
	
	$result8 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `usuarios` WHERE `sexo` = 'Indefinido'");
	$row8 = mysqli_fetch_assoc($result8);
	$count8 = $row8['count'];
	
	// --- SQL PESSOAS --- ///
	$result9 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `pessoas`");
	$row9 = mysqli_fetch_assoc($result9);
	$count9 = $row9['count'];	

	$result10 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `pessoas` WHERE `sexo` = 'Masculino'");
	$row10 = mysqli_fetch_assoc($result10);
	$count10 = $row10['count'];

	$result11 = mysqli_query(conexao(), "SELECT COUNT(*) AS `count` FROM `pessoas` WHERE `sexo` = 'Feminino'");
	$row11 = mysqli_fetch_assoc($result11);
	$count11 = $row11['count'];









	if(verificarSupervisor($db)>=1){

?>
	<div class="str">
	<?php 

		echo "<b>Contas</b></br>";
	    echo "Numero de contas: ".$count1."<br />".PHP_EOL;
	    echo "Numero de contas (acs): ".$count2."<br />".PHP_EOL;
	    echo "Numero de contas (acs) ativas: ".$count3."<br />".PHP_EOL;
	    echo "Numero de contas (acs) inativas: ".$count4."<br />".PHP_EOL;
	    echo "Numero de contas (acs) bloqueadas: ".$count5."<br />".PHP_EOL;
	    echo "Numero de contas (acs) do sexo masculino: ".$count6."<br />".PHP_EOL;
	    echo "Numero de contas (acs) do sexo feminino: ".$count7."<br />".PHP_EOL;
	    echo "Numero de contas (acs) que não definiram o sexo: ".$count8."<br />".PHP_EOL;
	?>
	</div>

	<div class="str">
	<?php 
		echo "<b>Pessoas</b></br>";
	    echo "Numero de pessoas cadastradas: ".$count9."<br />".PHP_EOL;
	    echo "Numero de pessoas do sexo masculino: ".$count10."<br />".PHP_EOL;
	    echo "Numero de pessoas do sexo feminino: ".$count11."<br />".PHP_EOL;
	?>
	</div>
<?php }else{} ?>