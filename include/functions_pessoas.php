<?php 
  // REQUERIMENTOS E INCLUDES;
    include_once 'require/conexao.php';
    include_once 'include/functions.php';
    include_once 'include/functions_logon.php';
    
    function PessoasDados($variavel, $value){
    	if($variavel == "sexo"){
    		switch ($value) {
    			case 0: $var = "Masculino"; break;
    			case 1: $var = "Feminino"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "raca_cor"){
    		switch ($value) {
    			case 0: $var = "Branca"; break;
    			case 1: $var = "Preta"; break;
    			case 2: $var = "Parda"; break;
    			case 3: $var = "Amarela"; break;
    			case 4: $var = "Indígena"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "nacionalidade"){
    		switch ($value) {
    			case 0: $var = "Brasileira"; break;
    			case 1: $var = "Naturalizado"; break;
    			case 2: $var = "Estrangeiro"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "curso_frequentado"){
    		switch ($value) {
				case 0: $var = "Creche"; break;
				case 1: $var = "Pré-escola (exceto CA)"; break;
				case 2: $var = "Classe Alfabetizada - CA"; break;
				case 3: $var = "Ensino Fundamental 1ª a 4ª séries"; break;
				case 4: $var = "Ensino Fundamental 5ª a 8ª séries"; break;
				case 5: $var = "Ensino Fundamental Completo"; break;
				case 6: $var = "Ensino Fundamental Especial"; break;
				case 7: $var = "Ensino Fundamental EJA - séries iniciais (Supletivo 1ª a 4ª)"; break;
				case 8: $var = "Ensino Fundamental EJA - séries finais (Supletivo 5ª a 9ª)"; break;
				case 9: $var = "Ensino Médio, Médio 2º Ciclo (Científico, Técnico e etc)"; break;
				case 10: $var = "Ensino Médio Especial"; break;
				case 11: $var = "Ensino Médio EJA (Supletivo)"; break;
				case 12: $var = "Superior, Aperfeiçoamento, Especialização, Mestrado,Doutorado"; break;
				case 13: $var = "Alfabetização para Adultos (Mobral, etc)"; break;
				case 14: $var = "Nenhum"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "situacao_trabalho"){
    		switch ($value) {
				case 0: $var = "Empregador"; break;
				case 1: $var = "Assalariado com carteira de trabalho"; break;
				case 2: $var = "Assalariado sem carteira de trabalho"; break;
				case 3: $var = "Autônomo com previdência social"; break;
				case 4: $var = "Autônomo sem previdência social"; break;
				case 5: $var = "Aposentado/Pensionista"; break;
				case 6: $var = "Desempregado"; break;
				case 7: $var = "Não trabalha"; break;
				case 8: $var = "Outro"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "socio_criancaficam"){
    		switch ($value) {
				case 0: $var = "Adulto Responsável"; break;
				case 1: $var = "Outra(s) Criança(s)"; break;
				case 2: $var = "Adolescente"; break;
				case 3: $var = "Sozinha"; break;
				case 4: $var = "Creche"; break;
				case 5: $var = "Outro"; break;
    			default: $var = ""; break;
    		}
    	}

    	if($variavel == "orientacao_tipo"){
    		switch ($value) {
				case 0: $var = "Heterossexual"; break;
				case 1: $var = "Gay"; break;
				case 2: $var = "Lésbica"; break;
				case 3: $var = "Travesti"; break;
				case 4: $var = "Bissexual"; break;
				case 5: $var = "Travesti"; break;
				case 6: $var = "Transsexual"; break;
				case 7: $var = "Outro"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "deficiència_tipo"){
    		switch ($value) {
				case 0: $var = "Auditiva"; break;
				case 1: $var = "Visual"; break;
				case 2: $var = "Intelectual/Cognitiva"; break;
				case 3: $var = "Física"; break;
				case 4: $var = "Outra"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "saida_cadastro"){
    		switch ($value) {
				case 0: $var = "Óbito"; break;
                case 1: $var = "Mudança de território"; break;
				case 2: $var = "Normal"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "considera_peso"){
    		switch ($value) {
				case 0: $var = "Abaixo do Peso"; break;
				case 1: $var = "Peso Adequado "; break;
				case 2: $var = "Acima do Peso"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "cardiaca_doenca"){
    		switch ($value) {
				case 0: $var = "Insuficiência Cardíaca"; break;
				case 1: $var = "Outro"; break;
				case 2: $var = "Não Sabe"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "rins_doenca"){
    		switch ($value) {
				case 0: $var = "Insuficiência Renal"; break;
				case 1: $var = "Outro"; break;
				case 2: $var = "Não Sabe"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "pulmao_doenca"){
    		switch ($value) {
				case 0: $var = "Asma"; break;
				case 1: $var = "DPOC/Enfisema"; break;
				case 2: $var = "Outro"; break;
				case 3: $var = "Não Sabe"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "rua_tempo"){
    		switch ($value) {
				case 0: $var = "< 6 meses"; break;
				case 1: $var = "6 a 12 meses"; break;
				case 2: $var = "1 a 5 anos"; break;
				case 3: $var = "5 anos"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "alimentacao_dia"){
    		switch ($value) {
				case 0: $var = "1 vez"; break;
				case 1: $var = "2 ou 3 vezes"; break;
				case 2: $var = "mais de 3 vezes"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "alimentacao_origem"){
    		switch ($value) {
				case 0: $var = "Restaurante Popular"; break;
				case 1: $var = "Doação Restaurante"; break;
				case 2: $var = "Doação Grupo Religioso"; break;
				case 3: $var = "Doação de Popular"; break;
				case 4: $var = "Outros"; break;
				default: $var = ""; break;
    		}
    	}

    	if($variavel == "higiene_acessos"){
    		$ex = explode(",", $value);
    		$res0 =($ex[0]==1) ? "Banho".", " : "";
    		$res1 =($ex[1]==1) ? "Acesso ao Sanitário".", " : "";
    		$res2 =($ex[2]==1) ? "Higiene Bucal".", " : "";
    		$res3 =($ex[3]==1) ? "Outros" : "";
    		$var = $res0.$res1.$res2.$res3;
    	}



    	if( $variavel == "frequenta_cuidador" || 
    		$variavel == "frequenta_grupo" || 
    		$variavel == "plano_saude_privado" || 
    		$variavel == "membro_comunidade" || 
    		$variavel == "orientacao_sexual" || 
    		$variavel == "pessoa_deficiente" || 
    		$variavel == "pessoa_gestante" || 
    		$variavel == "pessoa_fumante" || 
    		$variavel == "pessoa_alcool" || 
    		$variavel == "pessoa_drogas" || 
    		$variavel == "pessoa_hipertensao" || 
    		$variavel == "pessoa_diabetes" || 
    		$variavel == "pessoa_avc" || 
    		$variavel == "pessoa_infarto" || 
    		$variavel == "pessoa_cardiaca" || 
    		$variavel == "pessoa_rins" || 
    		$variavel == "pessoa_pulmao" || 
    		$variavel == "pessoa_hanseniase" || 
    		$variavel == "pessoa_tuberculose" ||
    		$variavel == "pessoa_cancer" ||
    		$variavel == "pessoa_internacao" ||
    		$variavel == "pessoa_mental" ||
    		$variavel == "pessoa_acamada" ||
    		$variavel == "pessoa_domiciliado" ||
    		$variavel == "pessoa_plantas" ||
    		$variavel == "situacao_rua" ||
    		$variavel == "recebe_beneficio" ||
    		$variavel == "referencia_familiar" ||
    		$variavel == "acompanhamento_instituicao" ||
    		$variavel == "visita_frequencia" ||
    		$variavel == "responsavel" ||
    		$variavel == "acesso_higiene" ){
    		switch ($value) {
    			case 0: $var = "Sim"; break;
    			case 1: $var = "Não"; break;
    			default: $var = ""; break;
    		}
    	}



    	return $var;
    }

    function familia($cod){
        $sqlcod = mysqli_query(conexao(), "SELECT * FROM familias WHERE cod_familia='".$cod."'") or die();
        $sqlsel = mysqli_fetch_array($sqlcod);
        $rescod = mysqli_num_rows($sqlcod);
        if($rescod>=1){
            $resultado = ucfirst($sqlsel['familia']);
        }else{
            $resultado = "Sem Familia";
        }
        return $resultado;
    }

    function formatarCartaoSUS($var){
        $parte_um     = substr($var, 0, 3);
        $parte_dois   = substr($var, 3, 4);
        $parte_tres   = substr($var, 6, 4);
        $parte_quatro = substr($var, 9, 4);
        return ("$parte_um $parte_dois $parte_tres $parte_quatro");
    }

    function retornarQuantidadeMes($data_nascimento){
        $date = new DateTime($data_nascimento); // Data de Nascimento
        $idade_acompanhamento = $date->diff(new DateTime($data_acompanhamento_calculo)); // Data do Acompanhamento
        $idade_acompanhamento_mostra_anos = $idade_acompanhamento->format('%Y')*12;
        $idade_acompanhamento_mostra_meses = $idade_acompanhamento->format('%m');


        $total_meses = $idade_acompanhamento_mostra_anos+$idade_acompanhamento_mostra_meses;
        $line1 = substr($total_meses,0,1);
        $line2 = substr($total_meses,1,1);
        return $line1.",".$line2;
    }

    function calculo_idade($data) {
        //Data atual
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        //Data do aniversário
        $nascimento = explode('-', $data);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);
        // se for formato do banco, use esse código em vez do de cima!
        /*
        $nascimento = explode('-', $nascimento);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);
         */
        //Calculando sua idade
        $idade = $ano - $anonasc; // simples, ano- nascimento!
        if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
        {
            $idade--;
            return $idade;
        }
        elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
        {
            $idade--;
            return $idade;
        }
        else // ja fez aniversario no ano, tudo certo!
        {
            return $idade;
        }
    }