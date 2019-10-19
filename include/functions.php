<?php

	// FUNÇÃO PARA RETORNAR TITULO
	function tituloPage($title){
		switch($title){
			case 'login': 
				$result = " - Login";
				break;

			case 'cadastro': 
				$result = " - Cadastro";
				break;

			case 'recuperar': 
				$result = " - Recuperar Senha";
				break;

			default:
				$result = " - Login";
				break;
		}
		return $result;	
	}


	// FUNÇÃO PARA LOGAR;
	function retorno($var){
		switch ($var) {
			case 'home':
				header('location:home.php?p=home');
				break;
			
			case 'login':
				header('location:index.php?p=login');
				break;
		
			case 'loginregister':
				header('location:index.php?p=login&msg=msgsuccessregister');
				break;
			
			case 'logoutsuccess':
				header('location:index.php?p=login&msg=msgsuccesslogout');
				break;
				
			case 'logoutcookie':
				header('location:index.php?p=login&msg=logoutcookie');
				break;

			case 'logout':
				header('location:home.php?p=logout');
				break;

			default:
				header('location:home.php?p=home');
				break;
		}		
	}


	// FUNÇÃO PARA RETORNAR AS MENSAGENS DE AÇÕES
	function Mensagem($msg){
		switch($msg){
			case 'errologin-1':
				$html = "Por favor preecha o campo cpf.";
				break;

			case 'errologin-2':
				$html = "Por favor preecha o campo senha.";
				break;
			
			case 'errologin-3':
				$html = "Senha incorreta.";
				break;
			
			case 'errologin-4':
				$html = "Usuário não existe.";
				break;
			
			case 'errocadastro-1':
				$html = "Erro ao Registrar!.";
				break;
			
			case 'errocadastro-2':
				$html = "Campo CPF: deve possuir 11 caracteres.";
				break;
			
			case 'errocadastro-3':
				$html = "Já existe um usuario com esse cpf.";
				break;

			case 'errocadastro-4':
				$html = "As senhas não conferem.";
				break;
			
			case 'msgsuccessregister':
				$html = "Conta criada com sucesso.";
				break;
			
			case 'msgsuccesslogout':
				$html = "Saiu com sucesso.";
				break;
			
			default:
				$html = "";
				break;
		}

		return $html;
	}

	function VerificarSession($status){
		if($status == 1){
			if(isset($_SESSION['nome']) && isset($_SESSION['sobrenome']) && isset($_SESSION['cpf'])){
		   		retorno('home');
		    }
		}else{
			if(!isset($_SESSION['nome']) && !isset($_SESSION['sobrenome']) && !isset($_SESSION['cpf'])){
		   		retorno('login');
		    }
		}
	}

	function MensagemSession(){
		if(isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != ""){
			switch ($_SESSION['mensagem']) {
				case 'login':
					echo '<script>toastr.success("Logado com sucesso.");</script>';
					break;
				case 'ativar':
					echo '<script>toastr.success("Conta ativada com sucesso.");</script>';
					break;
				case 'desativar':
					echo '<script>toastr.success("Conta desativada com sucesso.");</script>';
					break;
				case 'bloquear':
					echo '<script>toastr.success("Conta loqueada com sucesso.");</script>';
					break;
				case 'atualizado':
					echo '<script>toastr.info("Sua conta já está atualizada.");</script>';
					break;
				case 'atualizada':
					echo '<script>toastr.success("Sua conta foi atualizada com sucesso.");</script>';;
					break;				
				case 'cidade':
					echo '<script>toastr.success("Cidade adicionada com sucesso.");</script>';;
					break;
				case 'cidadedelet':
					echo '<script>toastr.success("Cidade deletada com sucesso.");</script>';;
					break;
				case 'erroradmin00':
					echo '<script>toastr.warning("Você não pode alterar uma conta admin.");</script>';;
					break;						
				case 'erroradmin01':
					echo '<script>toastr.warning("Você digitou seu cpf.");</script>';;
					break;	
				case 'erroradmin02':
					echo '<script>toastr.error("o campo cpf precisar ter 11 digitos e conter apenas números.");</script>';;
					break;
				case 'successadmin03':
					echo '<script>toastr.success("Conta atualizada como: Supervisor.");</script>';;
					break;
				case 'successadmin04':
					echo '<script>toastr.success("Conta atualizada como: Acs.");</script>';;
					break;
				case 'errorpessoa01':
					echo '<script>toastr.error("Você precisa digitar o cartão do sus.");</script>';;
					break;
				case 'errorpessoa02':
					echo '<script>toastr.error("Não existe nenhuma pessoa cadastrada por você com esse número de cartão do sus.");</script>';;
					break;
				case 'successpessoaatualizar1':
					echo '<script>toastr.success("Atualizado com sucesso.");</script>';;
					break;
				case 'successpessoaatualizar2':
					echo '<script>toastr.success("Adicionado obito para a pessoa com sucesso.");</script>';;
					break;
				case 'successpessoaatualizar3':
					echo '<script>toastr.success("Adicionado a saida de territorio para a pessoa com sucesso.");</script>';
					break;
				case 'successpessoaatualizar4':
					echo '<script>toastr.success("Conta voltou ao normal.");</script>';
					break;
				default:
					# code...
					break;
			}

			unset($_SESSION['mensagem']);
		}
	}