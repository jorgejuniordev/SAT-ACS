	<?php

	// --- INCLUDES --- ///
    include_once './require/conexao.php';
    include_once './include/functions.php';
    include_once './include/functions_logon.php';

    // --- SQL CONTAS --- ///
    $quantidade = 20; // QUANTIDADE DE CONTAS A SEREM SELECIONADAS (SEMPRE = + 1);
	$result1 = mysqli_query(conexao(), "SELECT * FROM USUARIOS ORDER BY ID DESC LIMIT ".$quantidade);

	include_once 'require/atualizar.php';

	if( ($db['sexo']!="Indefinido") && ($db['cartao_sus']!="") && ($db['ddd']!="") && ($db['telefone']!="") && ($db["cidade"]!="") && ($db["uf"]!="") || ($db["data_nascimento"]!="") ){
		$_SESSION['mensagem']   = "atualizado";
		header("Location:?p=home");
	}

	echo "<div class=\"attdados\">Precisamos que atualize seus dados cadastrais para poder-mos ativar sua conta.</div>";
?>

	<table class="table">
		<thead>
		<tr class="w3-red">
			<td>Dados</td>
		</tr>
		</thead>
	</table>
	<form method="POST" action="">
		<table class="table">
			<tr>
				<td>Sexo:</td>
				<td>
				  <input type="radio" name="sexo" value="Masculino" checked> Masculino</br>
				  <input type="radio" name="sexo" value="Feminino"> Feminino
  				</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td>Cartão do SUS:</td><td>
				<input type="text" name="cartao" class="input" maxlength="15" placeholder="cartão do sus"/></td>
				<td></td><td></td>
			</tr>
			<tr>
				<td>Telefone:</td><td>
				<input type="text" name="ddd" id="dddreduce" maxlength="3" class="input" placeholder="ddd" />
				<input type="text" name="telefone" class="input" maxlength="10" placeholder="telefone" />
				</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td>UF:</td><td>
				<select name="uf" class="input">
				<?php 
					$sqluf = mysqli_query(conexao(), "SELECT DISTINCT uf FROM disponibilidade GROUP BY uf") or die();
					while($row = mysqli_fetch_array($sqluf)){
						echo "<option value=\"".strtoupper($row['uf'])."\">".strtoupper($row['uf'])."</option>";
					}
				?>
				</select>
				</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td>Cidade:</td><td>
				<select name="cidade" class="input">
				<?php 
					$sqlcit = mysqli_query(conexao(), "SELECT DISTINCT cidade FROM disponibilidade GROUP BY cidade") or die();
					while($row2 = mysqli_fetch_array($sqlcit)){
						echo "<option name=\"cidade\" value=\"".ucfirst($row2['cidade'])."\">".ucfirst($row2['cidade'])."</option>";
					}
				?>
				</select>
				</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td>Data de Nascimento:</td>
				<td><input type="text" maxlength="10" name="data" class="input" placeholder="dia/mês/ano">
				</td>
				<td></td><td></td>
			</tr>

			<tr>
				<td>Confirme sua Senha:</td>
				<td><input type="password" name="pass" class="input" placeholder="Digite sua senha">
				</td>
				<td></td><td></td>
			</tr>
			<tr>
			<td></td><td>
				<a href=home.php?p=supervisionar-lista&list=2&pg=$ultima>
				<button type="submit" name="submit" value="atualizar" class="button btn-small2 green" type="button">Atualizar</button>
				</a>
			</td><td></td><td></td>
			</tr>
		</table>
	</form>