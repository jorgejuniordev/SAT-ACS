<?php 

	if(isset($_POST['Atualizar'])){
		$variavel01 = $_POST['nomecompleto'];
		$variavel02 = $_POST['nomesocial'];
		$variavel03 = $_POST['datanascimento'];
		$variavel04 = $_POST['sexo'];
		$variavel05 = $_POST['raca'];
		$variavel06 = $_POST['nis'];
		$variavel07 = $_POST['nomecompletomae'];
		$variavel08 = $_POST['nacionalidade'];
		$variavel09 = $_POST['pais'];
		$variavel10 = $_POST['ddd'];
		$variavel11 = $_POST['telefone'];
		$variavel12 = $_POST['uf'];
		$variavel13 = $_POST['municipio'];
		$variavel14 = $_POST['email'];
		$variavel15 = $_POST['cartaosus'];
		$variavel16 = $_POST['responsavel'];
		$variavel17 = $_POST['responsavel_cardsus'];
		$variavel18 = $_POST['responsavel_datanascimento'];
		$variavel19 = $_POST['socio_relacaoresponsavel'];
		$variavel20 = $_POST['socio_relacaoresponsavel_ocupacao'];
		$variavel21 = $_POST['socio_frequentacreche'];
		$variavel22 = $_POST['socio_frequentacurso'];
		$variavel23 = $_POST['socio_situacaotrabalho'];
		$variavel24 = $_POST['socio_criancaficam'];
		$variavel25 = $_POST['socio_frequentacuidador'];
		$variavel26 = $_POST['socio_grupocomunitario'];
		$variavel27 = $_POST['socio_planosaudeprivado'];
		$variavel28 = $_POST['socio_comunidadetradicional'];
		$variavel29 = $_POST['socio_comunidadetradicionalnome'];
		$variavel30 = $_POST['socio_orientacaosexual'];
		$variavel31 = $_POST['socio_orientacaosexualopt'];
		$variavel32 = $_POST['socio_deficiencia'];
		$variavel33 = $_POST['socio_deficienciaopt'];
		$variavel34 = $_POST['socio_gestante'];
		$variavel35 = $_POST['socio_gestanteref'];
		$variavel36 = $_POST['socio_pesoopt'];
		$variavel37 = $_POST['socio_fumanteopt'];
		$variavel38 = $_POST['socio_alcoolopt'];
		$variavel39 = $_POST['socio_drogasopt'];
		$variavel40 = $_POST['socio_arterialopt'];
		$variavel41 = $_POST['socio_diabetesopt'];
		$variavel42 = $_POST['socio_avcderrameopt'];
		$variavel43 = $_POST['socio_infartoopt'];
		$variavel44 = $_POST['socio_cardiacaopt'];
		$variavel45 = $_POST['socio_cardiacaopt2'];
		$variavel46 = $_POST['socio_rinsopt'];
		$variavel47 = $_POST['socio_rinsopt2'];
		$variavel48 = $_POST['socio_respiratoriaopt'];
		$variavel49 = $_POST['socio_respiratoriaopt2'];
		$variavel50 = $_POST['socio_hanseniaseopt'];
		$variavel51 = $_POST['socio_tuberculoseopt'];
		$variavel52 = $_POST['socio_canceropt'];
		$variavel53 = $_POST['socio_internacaoopt'];
		$variavel54 = $_POST['socio_internacaooptcausa'];
		$variavel55 = $_POST['socio_psiquiatraopt'];
		$variavel56 = $_POST['socio_acamadoopt'];
		$variavel57 = $_POST['socio_domiciliadoopt'];
		$variavel58 = $_POST['socio_plantasopt'];
		$variavel59 = $_POST['socio_plantasopt2'];
		$variavel60 = $_POST['socio_praticasintegrativasopt1'];
		$variavel61 = $_POST['socio_praticasintegrativasopt2'];
		$variavel62 = $_POST['socio_praticasintegrativasopt3'];
		$variavel63 = $_POST['socio_praticasintegrativasopt4'];
		$variavel64 = $_POST['socio_situacaoruaopt1'];
		$variavel65 = $_POST['socio_situacaoruaopt2'];
		$variavel66 = $_POST['socio_beneficioopt'];
		$variavel67 = $_POST['socio_referenciafamiliaropt'];
		$variavel68 = $_POST['socio_numalimentacao'];
		$variavel69 = $_POST['socio_alimentacaoopt'];
		$variavel70 = $_POST['socio_acompanhadoinstopt'];
		$variavel71 = $_POST['socio_acompanhadoinstopt2'];
		$variavel72 = $_POST['socio_visitarfamiliar'];
		$variavel73 = $_POST['socio_visitarfamiliar2'];
		$variavel74 = $_POST['socio_acessohigienepessoalopt'];
		if($_POST['socio_acessohigienepessoalopt0']==1){
			$exo1=$_POST['socio_acessohigienepessoalopt0'];
		}else{
			$exo1=0;
		}

		if($_POST['socio_acessohigienepessoalopt1']==1){
			$exo2=$_POST['socio_acessohigienepessoalopt1'];
		}else{
			$exo2=0;
		}

		if($_POST['socio_acessohigienepessoalopt2']==1){
			$exo3=$_POST['socio_acessohigienepessoalopt2'];
		}else{
			$exo3=0;
		}

		if($_POST['socio_acessohigienepessoalopt3']==1){
			$exo4=$_POST['socio_acessohigienepessoalopt3'];
		}else{
			$exo4=0;
		}
		$variavel75 = $exo1.",".$exo2.",".$ex3.",".$exo4;
		$dbuser =$row['id'];

		// VERIFICA SE EXISTEM E NÃO SÃO NULAS;
		if(
			(isset($variavel01) && ($variavel01!="")) && 
			(isset($variavel03) && ($variavel03!="")) && 
			(isset($variavel04) && ($variavel04!="")) && 
			(isset($variavel05) && ($variavel05!="")) && 
			(isset($variavel08) && ($variavel08!="")) && 
			(isset($variavel12) && ($variavel12!="")) && 
			(isset($variavel13) && ($variavel13!="")) && 
			(isset($variavel21) && ($variavel21!="")) && 
			(isset($variavel32) && ($variavel32!="")) && 
			(isset($variavel64) && ($variavel64!=""))
		){
			

				$sucesso = mysqli_query(conexao(), "UPDATE pessoas SET 
										nome_completo='$variavel01',
										nome_social='$variavel02',
										sexo='$variavel04',
										raca_cor='$variavel05',
										data_nascimento='$variavel03',
										nis='$variavel06',
										nome_mae='$variavel07',
										nacionalidade='$variavel08',
										pais_nascimento='$variavel09',
										ddd='$variavel10',
										telefone='$variavel11',
										uf='$variavel12',
										cidade='$variavel13',
										email='$variavel14',
										ocupacao='$variavel20',
										cartao_sus='$variavel15',
										relacao_parentesco='$variavel19',
										frequenta_creche='$variavel21',
										curso_frequentado='$variavel22',
										situacao_trabalho='$variavel23',
										crianca_localiza='$variavel24',
										frequenta_cuidador='$variavel25',
										frequenta_grupo='$variavel26',
										plano_saude_privado='$variavel27',
										membro_comunidade='$variavel28',
										comunidade_nome='$variavel29',
										orientacao_sexual='$variavel30',
										orientacao_tipo='$variavel31',
										pessoa_deficiente='$variavel32',
										deficiència_tipo='$variavel33',
										pessoa_gestante='$variavel34',
										maternidade_referencia='$variavel35',
										considera_peso='$variavel36',
										pessoa_fumante='$variavel37',
										pessoa_alcool='$variavel38',
										pessoa_drogas='$variavel39',
										pessoa_hipertensao='$variavel40',
										pessoa_diabetes='$variavel41',
										pessoa_avc='$variavel42',
										pessoa_infarto='$variavel43',
										pessoa_cardiaca='$variavel44',
										cardiaca_doenca='$variavel45',
										pessoa_rins='$variavel46',
										rins_doenca='$variavel47',
										pessoa_pulmao='$variavel48',
										pulmao_doenca='$variavel49',
										pessoa_hanseniase='$variavel50',
										pessoa_tuberculose='$variavel51',
										pessoa_cancer='$variavel52',
										pessoa_internacao='$variavel53',
										internacao_causa='$variavel54',
										pessoa_mental='$variavel55',
										pessoa_acamada='$variavel56',
										pessoa_domiciliado='$variavel57',
										pessoa_plantas='$variavel58',
										plantas_nome='$variavel59',
										pessoa_praticas='$variavel60',
										pessoa_condicao1='$variavel61',
										pessoa_condicao2='$variavel62',
										pessoa_condicao3='$variavel63',
										situacao_rua='$variavel64',
										rua_tempo='$variavel65',
										recebe_beneficio='$variavel66',
										referencia_familiar='$variavel67',
										alimentacao_dia='$variavel68',
										alimentacao_origem='$variavel69',
										acompanhamento_instituicao='$variavel70',
										instituicao_nome='$variavel71',
										visita_frequencia='$variavel72',
										visita_grauparentesco='$variavel73',
										acesso_higiene='$variavel74',
										higiene_acessos='$variavel75',
										responsavel='$variavel16',
										responsavel_cartaosus='$variavel17',
										responsavel_datanascimento='$variavel18' 
										WHERE id='$dbuser' ");

				$sus = $variavel15;
								
				echo "<script>location.href='?p=pessoas-editar&pg=$pg&sus=$sus&submit=search'</script>";
				$_SESSION['mensagem']='successpessoaatualizar1';
				//$_SESSION['mensagem']='cidade';
				//header("Location:?p=administrar&gerenciar=localidades");


		}else{
			echo '<script>toastr.error("Existem campos vázios.");</script>';
		}

	}