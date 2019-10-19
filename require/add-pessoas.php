<?php 

	if(isset($_POST['Adicionar'])){
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
		$variavel75 = $exo1.",".$exo2.",".$exo3.",".$exo4;

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
			(isset($variavel15) && ($variavel15!="")) && 
			(isset($variavel64) && ($variavel64!=""))
		){
			

			$sql = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE nome_completo='".$variavel01."' AND id_user='".$db['id']."'");
			$rel = mysqli_num_rows($sql);

			if($rel==0){
				mysqli_query(conexao(), "INSERT INTO pessoas (
										id_user,
										nome_completo, 
										nome_social, 
										sexo, 
										raca_cor, 
										data_nascimento, 
										nis, 
										nome_mae, 
										nacionalidade, 
										pais_nascimento, 
										ddd, 
										telefone, 
										uf, 
										cidade, 
										email, 
										ocupacao, 
										cartao_sus, 
										relacao_parentesco, 
										frequenta_creche, 
										curso_frequentado, 
										situacao_trabalho, 
										crianca_localiza, 
										frequenta_cuidador, 
										frequenta_grupo, 
										plano_saude_privado, 
										membro_comunidade, 
										comunidade_nome, 
										orientacao_sexual, 
										orientacao_tipo, 
										pessoa_deficiente, 
										deficiència_tipo, 
										pessoa_gestante, 
										maternidade_referencia, 
										considera_peso, 
										pessoa_fumante, 
										pessoa_alcool, 
										pessoa_drogas, 
										pessoa_hipertensao, 
										pessoa_diabetes, 
										pessoa_avc, 
										pessoa_infarto, 
										pessoa_cardiaca, 
										cardiaca_doenca, 
										pessoa_rins, 
										rins_doenca, 
										pessoa_pulmao, 
										pulmao_doenca, 
										pessoa_hanseniase, 
										pessoa_tuberculose, 
										pessoa_cancer, 
										pessoa_internacao, 
										internacao_causa, 
										pessoa_mental, 
										pessoa_acamada, 
										pessoa_domiciliado, 
										pessoa_plantas, 
										plantas_nome, 
										pessoa_praticas, 
										pessoa_condicao1, 
										pessoa_condicao2, 
										pessoa_condicao3, 
										situacao_rua, 
										rua_tempo, 
										recebe_beneficio, 
										referencia_familiar, 
										alimentacao_dia, 
										alimentacao_origem, 
										acompanhamento_instituicao, 
										instituicao_nome, 
										visita_frequencia, 
										visita_grauparentesco, 
										acesso_higiene, 
										higiene_acessos,
										responsavel,
										responsavel_cartaosus,
										responsavel_datanascimento
									) VALUES (
									'".$db['id']."',
									'".$variavel01."',
									'".$variavel02."',
									'".$variavel04."',
									'".$variavel05."',
									'".$variavel03."',
									'".$variavel06."',
									'".$variavel07."',
									'".$variavel08."',
									'".$variavel09."',
									'".$variavel10."',
									'".$variavel11."',
									'".$variavel12."',
									'".$variavel13."',
									'".$variavel14."',								
									'".$variavel20."',
									'".$variavel15."',
									'".$variavel19."',
									'".$variavel21."',
									'".$variavel22."',
									'".$variavel23."',
									'".$variavel24."',
									'".$variavel25."',
									'".$variavel26."',
									'".$variavel27."',
									'".$variavel28."',
									'".$variavel29."',
									'".$variavel30."',
									'".$variavel31."',
									'".$variavel32."',
									'".$variavel33."',
									'".$variavel34."',
									'".$variavel35."',
									'".$variavel36."',
									'".$variavel37."',
									'".$variavel38."',
									'".$variavel39."',
									'".$variavel40."',
									'".$variavel41."',
									'".$variavel42."',
									'".$variavel43."',
									'".$variavel44."',
									'".$variavel45."',
									'".$variavel46."',
									'".$variavel47."',
									'".$variavel48."',
									'".$variavel49."',
									'".$variavel50."',
									'".$variavel51."',
									'".$variavel52."',
									'".$variavel53."',
									'".$variavel54."',
									'".$variavel55."',
									'".$variavel56."',
									'".$variavel57."',
									'".$variavel58."',
									'".$variavel59."',
									'".$variavel60."',
									'".$variavel61."',
									'".$variavel62."',
									'".$variavel63."',
									'".$variavel64."',
									'".$variavel65."',
									'".$variavel66."',
									'".$variavel67."',
									'".$variavel68."',
									'".$variavel69."',
									'".$variavel70."',
									'".$variavel71."',
									'".$variavel72."',
									'".$variavel73."',
									'".$variavel74."',
									'".$variavel75."',
									'".$variavel16."',
									'".$variavel17."',
									'".$variavel18."')");
				echo '<script>toastr.success("Cadastrado com sucesso.");</script>';
				//$_SESSION['mensagem']='cidade';
				//header("Location:?p=administrar&gerenciar=localidades");
			}else{
				echo '<script>toastr.info("Já existe uma pessoa com esse nome cadastrada por você.");</script>';
			}



		}else{
			echo '<script>toastr.error("Existem campos vázios.");</script>';
		}

	}