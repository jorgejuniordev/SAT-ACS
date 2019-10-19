<?php 
	if(isset($_POST['submit']) && $_POST['submit']=='atualizar'){
		$sx = strip_tags($_POST['sexo']);
		$ss = strip_tags($_POST['cartao']);
		$dd = strip_tags($_POST['ddd']);
		$tl = strip_tags($_POST['telefone']);
		$cd = ucfirst(strip_tags($_POST['cidade']));
		$uf = strtoupper(strip_tags($_POST['uf']));
		$dt = strip_tags($_POST['data']);
		$ps = md5(strip_tags($_POST['pass']));
		
		$ex = explode("/", $dt);
		$d = isset($ex[0]);
		$m = isset($ex[1]);
		$y = isset($ex[2]);
		$id = $db['id'];


		if($sx!="" && $ss!="" && $dd!="" && $tl!="" && $cd!="" && $uf!="" && $dt!="" && $ps!=""){
			if($sx=="Masculino" || $sx=="Feminino"){
				if(is_numeric($ss) && (strlen($ss) == 15)){
					$sql = mysqli_query(conexao(),"SELECT cartao_sus FROM usuarios WHERE cartao_sus='ss'");
					$res = mysqli_num_rows($sql);
					if($res == 0){
						if(is_numeric($dd) && (strlen($dd) == 3)){
							if(is_numeric($tl)){
								if(checkdate($m, $d, $y)){

			                        $sql1 = "SELECT * FROM disponibilidade WHERE cidade='$cd'";
			                        $res1 = mysqli_query(conexao(), $sql1);
			                        $conn = mysqli_fetch_assoc($res1);

			                        $sql2 = "SELECT * FROM disponibilidade WHERE uf='$uf'";
			                        $res2 = mysqli_query(conexao(), $sql2);
			                        $conr = mysqli_fetch_assoc($res2);

									if($conn['uf'] == $conr['uf']){
										if($ps==$db['senha']){
											mysqli_query(conexao(), "UPDATE usuarios SET sexo='$sx', cartao_sus='$ss', cidade='$cd', uf='$uf', ddd='$dd', telefone='$tl', data_nascimento='".$ex[2]."-".$ex[1]."-".$ex[0]."' WHERE id='$id'");
											$_SESSION['mensagem'] = "atualizada";
											header("Location:?p=home");
										}else{
											 echo '<script>toastr.error("Senha incorreta.");</script>';;
										}
									}else{
										echo '<script>toastr.error("Cidade e estado não conferem.");</script>';;
									}
								}else{
									echo '<script>toastr.error("Formato incorreto na data de nascimento.");</script>';;
								}
							}else{
								echo "O número de telefone deve conter apenas números.";
								echo '<script>toastr.error("O número de telefone deve conter apenas números.");</script>';;
							}
						}else{
							echo '<script>toastr.error("O número do seu DDD deve conter apenas números e 3 digitos.");</script>';;
						}						
					}else{
						echo '<script>toastr.error("á existe um usuário com esse cartão do sus.");</script>';;
					}
				}else{
					echo '<script>toastr.error("O número do cartão do SUS deve conter apenas números e 15 digitos.");</script>';;
				}				
			}else{
				echo '<script>toastr.error("Selecione o sexo corretamente.");</script>';;
			}

		}else{
			echo '<script>toastr.error("Existem campos vázios.");</script>';;
		}
		if(isset($error)){
			$error;
		} 
	}

?>