<?php 
  if(isset($_GET['submit']) && ($_GET['submit']=='search')){
	$pg = isset($_GET['pg']) ? $_GET['pg'] : 0;
  $sus = $_GET['sus'];
  $idd = $db['id'];

	$sqlu = mysqli_query(conexao(), "SELECT * FROM pessoas WHERE cartao_sus='$sus' AND id_user='$idd'") or die();
	$resu = mysqli_num_rows($sqlu);
    
    if($resu==1){

    while($row = mysqli_fetch_array($sqlu)){

    include_once ('require/editar-pessoas.php');



    if(isset($_POST['saida_obito'])){
      mysqli_query(conexao(), "UPDATE pessoas SET saida_cadastro='0' WHERE id='".$row['id']."'");
      $_SESSION['mensagem']='successpessoaatualizar2';
      echo "<script>location.href='?p=pessoas-editar&pg=$pg&sus=$sus&submit=search'</script>";
    }    

    if(isset($_POST['saida_territorio'])){
      mysqli_query(conexao(), "UPDATE pessoas SET saida_cadastro='1' WHERE id='".$row['id']."'");
      $_SESSION['mensagem']='successpessoaatualizar3';
      echo "<script>location.href='?p=pessoas-editar&pg=$pg&sus=$sus&submit=search'</script>";
    }    

    if(isset($_POST['normalizar'])){
      mysqli_query(conexao(), "UPDATE pessoas SET saida_cadastro='2' WHERE id='".$row['id']."'");
      $_SESSION['mensagem']='successpessoaatualizar4';
      echo "<script>location.href='?p=pessoas-editar&pg=$pg&sus=$sus&submit=search'</script>";
    }

?>
<center>
<form method="POST" action="">
    <a href="?p=pessoas&pg=<?=$pg;?>"><button class="button btn-small2 red" type="button">Voltar</button></a>
  <?php if($row['saida_cadastro']=="0"){ ?>
    <button type="submit" class="button btn-small2 orange" name="saida_territorio" type="button">Mudança de território</button>
    <button type="submit" class="button btn-small2 green" name="normalizar" type="button">Normalizar</button>
  <?php }elseif($row['saida_cadastro']=="1"){ ?>
    <button type="submit" class="button btn-small2 blue" name="saida_obito" type="button">Óbito</button>
    <button type="submit" class="button btn-small2 green" name="normalizar" type="button">Normalizar</button>
  <?php }else{ ?>
    <button type="submit" class="button btn-small2 orange" name="saida_territorio" type="button">Mudança de território</button>
    <button type="submit" class="button btn-small2 blue" name="saida_obito" type="button">Óbito</button>
  <?php } ?>
</form>




<form method="POST" action="">
  <center><H1>[<?=PessoasDados("saida_cadastro", $row['saida_cadastro']);?>] - <?=ucfirst($row['nome_completo']);?></H1></center>
  <div class="div">
    <table class="table">
     <thead>
      <tr class="w3-blue">
       <th>IDENTIFICAÇÃO DO USUÁRIO / CIDADÃO</th>
     </tr>
   </thead>
 </table>
 <table class="table">
   <thead class="">
    <tr>
      <th class="reduz">NOME COMPLETO:<b>*</b></th>
      <th><input value="<?=$row['nome_completo'];?>" type="text" name="nomecompleto" placeholder="Digite o nome completo" class="input5" maxlength="100" required/></th>
      <th class="reduz">NOME SOCIAL:</th>
      <th><input value="<?=$row['nome_social'];?>" type="text" name="nomesocial" placeholder="Digite o nome social" class="input5" maxlength="100" /></th>
    </tr>		
    <tr>
     <th class="reduz">DATA DE NASCIMENTO:<b>*</b></th>
     <th>
     <input type="date" name="datanascimento" class="input5" value="<?=$row['data_nascimento'];?>"  required/>
     </th>
     <th class="reduz">SEXO:<b>*</b></th>
     <th>
      <input type="radio" name="sexo" value="0" required <?=($row['sexo']==0)?"checked":"";?> /> Masculino  
      <input type="radio" name="sexo" value="1" required <?=($row['sexo']==1)?"checked":"";?> /> Feminino
    </th>
  </tr>
  <tr>
    <th class="reduz">RAÇA/COR:<b>*</b></th>
    <th>
      <input type="radio" name="raca" value="0" <?=($row['raca_cor']==0)?"checked":"";?> required/> Branca  
      <input type="radio" name="raca" value="1" <?=($row['raca_cor']==1)?"checked":"";?> required/> Preta 
      <input type="radio" name="raca" value="2" <?=($row['raca_cor']==2)?"checked":"";?> required/> Parda 
      <input type="radio" name="raca" value="3" <?=($row['raca_cor']==3)?"checked":"";?> required/> Amarela 
      <input type="radio" name="raca" value="4" <?=($row['raca_cor']==4)?"checked":"";?>required/> Indígena
    </th>
    <th class="reduz">Nº NIS (PIS/PASEP):</th>
    <th>
      <input type="text" name="nis" value="<?=$row['nis'];?>" placeholder="Digite o número NIS (PIS/PASEP)" class="input5" maxlength="20"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">NOME COMPLETO DA MÃE:</th>
    <th>
      <input type="text" name="nomecompletomae" value="<?=$row['nome_mae'];?>" placeholder="Digite o nome da mãe completo" class="input5" maxlength="100"/></br>
    </th>
    <th class="reduz">NACIONALIDADE:<b>*</b></th>
    <th>
      <input type="radio" name="nacionalidade" value="0" <?=($row['nacionalidade']==0)?"checked":"";?> required> Brasileira 
      <input type="radio" name="nacionalidade" value="1" <?=($row['nacionalidade']==1)?"checked":"";?> required/> Naturalizado 
      <input type="radio" name="nacionalidade" value="2" <?=($row['nacionalidade']==2)?"checked":"";?>  required/> Estrangeiro
    </th>
  </tr>
  <tr>
    <th class="reduz">PAÍS DE NASCIMENTO:</th>
    <th><input type="text" name="pais" value="<?=$row['pais_nascimento'];?>" placeholder="Digite o país de nascimento" class="input5" maxlength="100"/></th>
    <th class="reduz">TELEFONE CELULAR:</th>
    <th>
      <input type="text" name="ddd" value="<?=$row['ddd'];?>"  placeholder="DDD" class="input3" maxlength="3"/>
      <input type="text" name="telefone" value="<?=$row['telefone'];?>"  placeholder="Telefone" class="input6" maxlength="15"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">MUNICÍPIO E UF DE NASCIMENTO:<b>*</b></th>
    <th>
      <input type="text" name="uf" value="<?=$row['uf'];?>"  placeholder="UF" class="input3" maxlength="2" required/>
      <input type="text" name="municipio" value="<?=$row['cidade'];?>" placeholder="Municipio" class="input6" maxlength="15" required/>
    </th>
    <th class="reduz">E-MAIL:</th>
    <th>
      <input type="email" name="email" value="<?=$row['email'];?>"  placeholder="Digite o e-mail" class="input5" maxlength="60"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">Nº DO CARTÃO SUS:</th>
    <th><input type="text" name="cartaosus" value="<?=$row['cartao_sus'];?>"  placeholder="Digite o número do cartão do sus" class="input5" maxlength="15"/></th>
    <th class="reduz"></th><th></th>
  </tr>    
  <!-- #NUM 01 -->
</thead>
</table>
<table class="table">
  <thead>
    <tr class="w3-blue">
      <th>RESPONSÁVEL FAMILIAR</th>
    </tr>
  </thead>
</table>
<table class="table">
  <thead class="">
    <!-- #NUM 01 -->
    <tr>
      <th class="reduz">É O RESPONSÁVEL?</th>
      <th>
        <input type="radio" name="responsavel" <?=($row['responsavel']==0)?"checked":"";?> value="0"> Sim 
        <input type="radio" name="responsavel" <?=($row['responsavel']==1)?"checked":"";?> value="1"/> Não
      </th>
      <th class="reduz">Nº DO CARTÃO SUS:</th>
      <th><input type="text" name="responsavel_cardsus" value="<?=$row['responsavel_cartaosus'];?>" placeholder="Digite o número do cartão do sus do responsável" class="input5" maxlength="15"/></th>
    </tr>   
    <tr>
      <th class="reduz">DATA DE NASCIMENTO DO RESPONSÁVEL FAMILIAR:</th>
      <th><input type="date" name="responsavel_datanascimento" value="<?=$row['responsavel_datanascimento'];?>" class="input5"/></th>
      <th class="reduz"></th><th></th>
    </tr>
  </thead>
</table>
</div>
<center><H1>INFORAMAÇÕES SOCIODEMOGRÁFICAS</H1></center>
<div class="div">
  <table class="table">
    <thead>
      <tr class="w3-blue">
        <th>RESPONSÁVEL FAMILIAR</th>
      </tr>
    </thead>
  </table>
  <table class="table">
    <thead class="">
      <!-- #NUM 01 -->
      <tr>
        <th class="reduz">RELAÇÃO DE PARENTESCO COM O RESPONSÁVEL FAMILIAR:</th>
        <th>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==0)?"checked":"";?> value="0"> Cônjuge / Comapnheiro(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==1)?"checked":"";?> value="1"/> Filho(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==2)?"checked":"";?> value="2"/> Enteado(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==3)?"checked":"";?> value="3"/> Enteado(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==4)?"checked":"";?> value="4"/> Pai / Mãe</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==5)?"checked":"";?> value="5"/> Sogro(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==6)?"checked":"";?> value="6"/> Irmão / Irmã</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==7)?"checked":"";?> value="7"/> Genro / Nora</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==8)?"checked":"";?> value="8"/> Outro parente</br>
          <input type="radio" name="socio_relacaoresponsavel" <?=($row['relacao_parentesco']==9)?"checked":"";?> value="9"/> Não parente
        </th>
        <th class="reduz">OCUPAÇÃO:</th>
        <th>
          <input type="text" name="socio_relacaoresponsavel_ocupacao" value="<?=$row['ocupacao'];?>" placeholder="Digite a ocupação do responsável" class="input5" maxlength="255"/>
        </th>
      </tr> 
    </thead>
  </table>
  <table class="table">
    <thead>
      <tr class="w3-blue">
        <th>INFORMAÇÕES</th>
      </tr>
    </thead>
  </table>
  <table class="table">
    <thead class="">
      <!-- #NUM 01 -->
      <tr>
        <th class="reduz">FREQUENTA ESCOLA OU CRECHE?<b>*</b></th>
        <th>
          <input type="radio" name="socio_frequentacreche" <?=($row['frequenta_creche']==0)?"checked":"";?> value="0" required> Sim</br>
          <input type="radio" name="socio_frequentacreche" <?=($row['frequenta_creche']==1)?"checked":"";?> value="1" required/> Não
        </th>
        <th class="reduz">QUAL É O CURSO MAIS ELEVADO QUE FREQUENTA OU FREQUENTOU?</th>
        <th>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==0)?"checked":"";?> value="0"> Creche</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==1)?"checked":"";?> value="1"/> Pré-escola (exceto CA)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==2)?"checked":"";?> value="2"/> Classe Alfabetizada - CA</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==3)?"checked":"";?> value="3"/> Ensino Fundamental 1ª a 4ª séries</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==4)?"checked":"";?> value="4"/> Ensino Fundamental 5ª a 8ª séries</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==5)?"checked":"";?> value="5"/> Ensino Fundamental Completo</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==6)?"checked":"";?> value="6"/> Ensino Fundamental Especial</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==7)?"checked":"";?> value="7"/> Ensino Fundamental EJA - séries iniciais (Supletivo 1ª a 4ª)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==8)?"checked":"";?> value="8"/> Ensino Fundamental EJA - séries finais (Supletivo 5ª a 9ª)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==9)?"checked":"";?> value="9"/> Ensino Médio, Médio 2º Ciclo (Científico, Técnico e etc)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==10)?"checked":"";?> value="10"/> Ensino Médio Especial</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==11)?"checked":"";?> value="11"/> Ensino Médio EJA (Supletivo)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==12)?"checked":"";?> value="12"/> Superior, Aperfeiçoamento, Especialização, Mestrado,Doutorado</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==13)?"checked":"";?> value="13"/> Alfabetização para Adultos (Mobral, etc)</br>
          <input type="radio" name="socio_frequentacurso" <?=($row['curso_frequentado']==14)?"checked":"";?> value="14"/> Nenhum
        </th>
      </tr>  
      <tr>
        <th class="reduz">SITUAÇÃO NO MERCADO DE TRABALHO</th>
        <th>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==0)?"checked":"";?> value="0"/> Empregador</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==1)?"checked":"";?> value="1"/> Assalariado com carteira de trabalho</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==2)?"checked":"";?> value="2"/> Assalariado sem carteira de trabalho</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==3)?"checked":"";?> value="3"/> Autônomo com previdência social</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==4)?"checked":"";?> value="4"/> Autônomo sem previdência social</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==5)?"checked":"";?> value="5"/> Aposentado/Pensionista</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==6)?"checked":"";?> value="6"/> Desempregado</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==7)?"checked":"";?> value="7"/> Não trabalha</br>
          <input type="radio" name="socio_situacaotrabalho" <?=($row['situacao_trabalho']==8)?"checked":"";?> value="8"/> Outro
        </th>
        <th class="reduz">CRIANÇAS DE 0 A 9 ANOS, COM QUEM FICA?</th>
        <th>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==0)?"checked":"";?> value="0"/> Adulto Responsável</br>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==1)?"checked":"";?> value="1"/> Outra(s) Criança(s)</br>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==2)?"checked":"";?> value="2"/> Adolescente</br>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==3)?"checked":"";?> value="3"/> Sozinha</br>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==4)?"checked":"";?> value="4"/> Creche</br>
          <input type="radio" name="socio_criancaficam" <?=($row['crianca_localiza']==5)?"checked":"";?> value="5"/> Outro
        </th>
      </tr> 
      <tr>
        <th class="reduz">FREQUENTA CUIDADOR TRADICIONAL?</th>
        <th>
          <input type="radio" name="socio_frequentacuidador" <?=($row['frequenta_cuidador']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_frequentacuidador" <?=($row['frequenta_cuidador']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">PARTICIPA DE ALGUM GRUPO COMUNITÁRIO?</th>
        <th>
          <input type="radio" name="socio_grupocomunitario" <?=($row['frequenta_grupo']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_grupocomunitario" <?=($row['frequenta_grupo']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr> 
      <tr>
        <th class="reduz">POSSUI PLANO DE SAÚDE PRIVADO?</th>
        <th>
          <input type="radio" name="socio_planosaudeprivado" <?=($row['plano_saude_privado']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_planosaudeprivado" <?=($row['plano_saude_privado']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>   
      <tr>
        <th class="reduz">É MEMBRO DE POVO OU COMUNIDADE TRADICIONAL?</th>
        <th>
          <input type="radio" name="socio_comunidadetradicional" <?=($row['membro_comunidade']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_comunidadetradicional" <?=($row['membro_comunidade']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="text" name="socio_comunidadetradicionalnome" value="<?=$row['comunidade_nome'];?>" placeholder="Digite o nome da comunidade tradicional" class="input5" maxlength="255"/>
        </th>
      </tr>  
      <tr>
        <th class="reduz">DESEJA INFORMAR ORIENTAÇÃO SEXUAL / IDENTIDADE DE GÊNERO?</th>
        <th>
          <input type="radio" name="socio_orientacaosexual" <?=($row['orientacao_sexual']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_orientacaosexual" <?=($row['orientacao_sexual']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==0)?"checked":"";?> value="0"/> Heterossexual</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==1)?"checked":"";?> value="1"/> Gay</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==2)?"checked":"";?> value="2"/> Lésbica</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==3)?"checked":"";?> value="3"/> Travesti</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==4)?"checked":"";?> value="4"/> Bissexual</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==5)?"checked":"";?> value="5"/> Travesti</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==6)?"checked":"";?> value="6"/> Transsexual</br>
          <input type="radio" name="socio_orientacaosexualopt" <?=($row['orientacao_tipo']==7)?"checked":"";?> value="7"/> Outro
        </th>
      </tr> 
      <tr>
        <th class="reduz">TEM ALGUMA DEFICIÊNCIA?<b>*</b></th>
        <th>
          <input type="radio" name="socio_deficiencia" value="0" <?=($row['pessoa_deficiente']==0)?"checked":"";?> required/> Sim</br>
          <input type="radio" name="socio_deficiencia" value="1" <?=($row['pessoa_deficiente']==1)?"checked":"";?> required/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="radio" name="socio_deficienciaopt" <?=($row['deficiencia_tipo']==0)?"checked":"";?> value="0"/> Auditiva</br>
          <input type="radio" name="socio_deficienciaopt" <?=($row['deficiencia_tipo']==1)?"checked":"";?> value="1"/> Visual</br>
          <input type="radio" name="socio_deficienciaopt" <?=($row['deficiencia_tipo']==2)?"checked":"";?> value="2"/> Intelectual/Cognitiva</br>
          <input type="radio" name="socio_deficienciaopt" <?=($row['deficiencia_tipo']==3)?"checked":"";?> value="3"/> Física</br>
          <input type="radio" name="socio_deficienciaopt" <?=($row['deficiencia_tipo']==4)?"checked":"";?> value="4"/> Outra
        </th>
      </tr>
    </thead>
  </table>
</div>
<center><H1>QUESTIONÁRIO AUTO-REFERIDO DE CONDIÇÕES / SITUAÇÕES DE SAÚDE</H1></center>
<div class="div">
  <table class="table">
    <thead>
      <tr class="w3-blue">
        <th>CONDIÇÕES / SITUAÇÕES DE SAÚDE GERAIS</th>
      </tr>
    </thead>
  </table>
  <table class="table">
    <thead class="">
      <tr>
        <th class="reduz">ESTÁ GESTANTE?</th>
        <th>
          <input type="radio" name="socio_gestante" <?=($row['pessoa_gestante']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_gestante" <?=($row['pessoa_gestante']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL É A MATERNIDADE DE REFERÊNCIA?</th>
        <th>
          <input type="text" name="socio_gestanteref" value="<?=$row['maternidade_referencia'];?>" placeholder="Digite o nome da maternidade" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">SOBRE SEU PESO, VOCÊ SE CONSIDERA?</th>
        <th>
          <input type="radio" name="socio_pesoopt" <?=($row['considera_peso']==0)?"checked":"";?> value="0"/> Abaixo do Peso </br>
          <input type="radio" name="socio_pesoopt" <?=($row['considera_peso']==1)?"checked":"";?> value="1"/> Peso Adequado </br>
          <input type="radio" name="socio_pesoopt" <?=($row['considera_peso']==2)?"checked":"";?> value="2"/> Acima do Peso
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ FUMANTE?</th>
        <th>
          <input type="radio" name="socio_fumanteopt" <?=($row['pessoa_fumante']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_fumanteopt" <?=($row['pessoa_fumante']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">FAZ USO DE ÁLCOOL?</th>
        <th>
          <input type="radio" name="socio_alcoolopt" <?=($row['pessoa_alcool']==0)?"checked":"";?>  value="0"/> Sim </br>
          <input type="radio" name="socio_alcoolopt" <?=($row['pessoa_alcool']==1)?"checked":"";?>  value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">FAZ USO DE OUTRAS DROGAS?</th>
        <th>
          <input type="radio" name="socio_drogasopt" <?=($row['pessoa_drogas']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_drogasopt" <?=($row['pessoa_drogas']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">TEM HIPERTENSÃO ARTERIAL?</th>
        <th>
          <input type="radio" name="socio_arterialopt" <?=($row['pessoa_hipertensao']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_arterialopt" <?=($row['pessoa_hipertensao']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr>
      
      <tr>
        <th class="reduz">TEM DIABETES?</th>
        <th>
          <input type="radio" name="socio_diabetesopt" <?=($row['pessoa_diabetes']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_diabetesopt" <?=($row['pessoa_diabetes']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">TEVE AVC / DERRAME?</th>
        <th>
          <input type="radio" name="socio_avcderrameopt" <?=($row['pessoa_avc']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_avcderrameopt" <?=($row['pessoa_avc']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">TEVE INFARTO?</th>
        <th>
          <input type="radio" name="socio_infartoopt" <?=($row['pessoa_infarto']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_infartoopt" <?=($row['pessoa_infarto']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">TEM DOENÇA CARDÍACA / DO CORAÇÃO?</th>
        <th>
          <input type="radio" name="socio_cardiacaopt" <?=($row['pessoa_cardiaca']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_cardiacaopt" <?=($row['pessoa_cardiaca']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_cardiacaopt2" <?=($row['cardiaca_doenca']==0)?"checked":"";?> value="0"/> Insuficiência Cardíaca</br>
          <input type="radio" name="socio_cardiacaopt2" <?=($row['cardiaca_doenca']==1)?"checked":"";?> value="1"/> Outro</br>
          <input type="radio" name="socio_cardiacaopt2" <?=($row['cardiaca_doenca']==2)?"checked":"";?> value="2"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM OU TEVE PROBLEMAS NOS RINS?</th>
        <th>
          <input type="radio" name="socio_rinsopt" <?=($row['pessoa_rins']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_rinsopt" <?=($row['pessoa_rins']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_rinsopt2" <?=($row['rins_doenca']==0)?"checked":"";?> value="0"/> Insuficiência Renal</br>
          <input type="radio" name="socio_rinsopt2" <?=($row['rins_doenca']==1)?"checked":"";?> value="1"/> Outro</br>
          <input type="radio" name="socio_rinsopt2" <?=($row['rins_doenca']==2)?"checked":"";?> value="2"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM DOENÇA RESPIRATÓRIA / NO PULMÃO?</th>
        <th>
          <input type="radio" name="socio_respiratoriaopt" <?=($row['pessoa_pulmao']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_respiratoriaopt" <?=($row['pessoa_pulmao']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_respiratoriaopt2" <?=($row['pulmao_doenca']==0)?"checked":"";?> value="0"/> Asma</br>
          <input type="radio" name="socio_respiratoriaopt2" <?=($row['pulmao_doenca']==1)?"checked":"";?> value="1"/> DPOC/Enfisema</br>
          <input type="radio" name="socio_respiratoriaopt2" <?=($row['pulmao_doenca']==2)?"checked":"";?> value="2"/> Outro</br>
          <input type="radio" name="socio_respiratoriaopt2" <?=($row['pulmao_doenca']==3)?"checked":"";?> value="3"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ COM HANSENÍASE?</th>
        <th>
          <input type="radio" name="socio_hanseniaseopt" <?=($row['pessoa_hanseniase']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_hanseniaseopt" <?=($row['pessoa_hanseniase']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">ESTÁ COM TUBERCULOSE?</th>
        <th>
          <input type="radio" name="socio_tuberculoseopt" <?=($row['pessoa_tuberculose']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_tuberculoseopt" <?=($row['pessoa_tuberculose']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM OU TEVE CÂNCER?</th>
        <th>
          <input type="radio" name="socio_canceropt" <?=($row['pessoa_cancer']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_canceropt" <?=($row['pessoa_cancer']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      
      <tr>
        <th class="reduz">TEVE ALGUMA INTERNAÇÃO NOS ÚLTIMOS 12 MESES?</th>
        <th>
          <input type="radio" name="socio_internacaoopt" <?=($row['pessoa_internacao']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_internacaoopt" <?=($row['pessoa_internacao']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, POR QUAL CAUSA?</h9></th>
        <th>
          <input type="text" name="socio_internacaooptcausa" value="<?=$row['internacao_causa'];?>" placeholder="Digite a causa" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">FEZ OU FAZ TRATAMENTO COM PSIQUIATRA OU TEVE INTERNAÇÃO POR PROBLEMA DE SAÚDE MENTAL?</th>
        <th>
          <input type="radio" name="socio_psiquiatraopt" <?=($row['pessoa_mental']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_psiquiatraopt" <?=($row['pessoa_mental']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">ESTÁ ACAMADO?</th>
        <th>
          <input type="radio" name="socio_acamadoopt" <?=($row['pessoa_acamada']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_acamadoopt" <?=($row['pessoa_acamada']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ DOMICILIADO?</th>
        <th>
          <input type="radio" name="socio_domiciliadoopt" <?=($row['pessoa_domiciliado']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_domiciliadoopt" <?=($row['pessoa_domiciliado']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">USA PLANTAS MEDICINAIS?</th>
        <th>
          <input type="radio" name="socio_plantasopt" <?=($row['pessoa_plantas']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_plantasopt" <?=($row['pessoa_plantas']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="text" name="socio_plantasopt2" value="<?=$row['plantas_nome'];?>" placeholder="Informe quais plantas medicinais" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">USA OUTRAS PRÁTICAS INTEGRATIVAS E COMPLEMENTARES?</th>
        <th>
          <input type="radio" name="socio_praticasintegrativasopt1" <?=($row['pessoa_praticas']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_praticasintegrativasopt1" <?=($row['pessoa_praticas']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th><h9>SE SIM QUAL(IS)?</h9></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <th class="reduz">1 - QUAL?</th>
        <th>
          <input type="text" name="socio_praticasintegrativasopt2" value="<?=$row['pessoa_condicao1'];?>" placeholder="" class="input5" maxlength="255"/>
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">2 - QUAL?</th>
        <th>
          <input type="text" name="socio_praticasintegrativasopt3" value="<?=$row['pessoa_condicao2'];?>" placeholder="" class="input5" maxlength="255"/>
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">3 - QUAL?</th>
        <th>
          <input type="text" name="socio_praticasintegrativasopt4" value="<?=$row['pessoa_condicao3'];?>" placeholder="" class="input5" maxlength="255"/>
        </th>
        <th class="reduz"></th><th></th>
      </tr>
    </thead>
  </table>
  <table class="table">
    <thead>
      <tr class="w3-blue">
        <th>CIDADÃO EM SITUAÇÃO DE RUA</th>
      </tr>
    </thead>
  </table>
  <table class="table">
    <thead class="">
      <tr>
        <th class="reduz">ESTÁ EM SITUAÇÃO DE RUA?<b>*</b></th>
        <th>
          <input type="radio" name="socio_situacaoruaopt1" value="0" <?=($row['situacao_rua']==0)?"checked":"";?> required/> Sim </br>
          <input type="radio" name="socio_situacaoruaopt1" value="1" <?=($row['situacao_rua']==1)?"checked":"";?> required/> Não
        </th>
        <th class="reduz">TEMPO EM SITUAÇÃO DE RUA?</th>
        <th>
          <input type="radio" name="socio_situacaoruaopt2" <?=($row['rua_tempo']==0)?"checked":"";?> value="0"/> < 6 meses</br>
          <input type="radio" name="socio_situacaoruaopt2" <?=($row['rua_tempo']==2)?"checked":"";?> value="2"/> 6 a 12 meses</br>
          <input type="radio" name="socio_situacaoruaopt2" <?=($row['rua_tempo']==3)?"checked":"";?> value="3"/> 1 a 5 anos</br>
          <input type="radio" name="socio_situacaoruaopt2" <?=($row['rua_tempo']==4)?"checked":"";?> value="4" /> 5 anos
        </th>
      </tr>
      <tr>
        <th class="reduz">RECEBE ALGUM BENEFÍCIO?</th>
        <th>
          <input type="radio" name="socio_beneficioopt" <?=($row['recebe_beneficio']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_beneficioopt" <?=($row['recebe_beneficio']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">POSSUI REFERÊNCIA FAMILIAR?</th>
        <th>
          <input type="radio" name="socio_referenciafamiliaropt" <?=($row['referencia_familiar']==0)?"checked":"";?> value="0"/> Sim </br>
          <input type="radio" name="socio_referenciafamiliaropt" <?=($row['referencia_familiar']==1)?"checked":"";?> value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">QUANTAS VEZES SE ALIMENTA AO DIA?</th>
        <th>
          <input type="radio" name="socio_numalimentacao" <?=($row['alimentacao_dia']==0)?"checked":"";?> value="0"/> 1 vez</br>
          <input type="radio" name="socio_numalimentacao" <?=($row['alimentacao_dia']==1)?"checked":"";?> value="1"/> 2 ou 3 vezes</br>
          <input type="radio" name="socio_numalimentacao" <?=($row['alimentacao_dia']==2)?"checked":"";?> value="2"/> mais de 3 vezes
        </th>
        <th class="reduz">QUAL A ORIGEM DA ALIMENTAÇÃO?</th>
        <th>
          <input type="radio" name="socio_alimentacaoopt" <?=($row['alimentacao_origem']==0)?"checked":"";?> value="0"/> Restaurante Popular</br>
          <input type="radio" name="socio_alimentacaoopt" <?=($row['alimentacao_origem']==1)?"checked":"";?> value="1"/> Doação Restaurante</br>
          <input type="radio" name="socio_alimentacaoopt" <?=($row['alimentacao_origem']==2)?"checked":"";?> value="2"/> Doação Grupo Religioso</br>
          <input type="radio" name="socio_alimentacaoopt" <?=($row['alimentacao_origem']==3)?"checked":"";?> value="3"/> Doação de Popular</br>
          <input type="radio" name="socio_alimentacaoopt" <?=($row['alimentacao_origem']==4)?"checked":"";?> value="4"/> Outros
        </th>
      </tr>
      <tr>
        <th class="reduz">É ACOMPANHADO POR OUTRA INSTITUIÇÃO?</th>
        <th>
          <input type="radio" name="socio_acompanhadoinstopt" <?=($row['acompanhamento_instituicao']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_acompanhadoinstopt" <?=($row['acompanhamento_instituicao']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="text" name="socio_acompanhadoinstopt2" value="<?=$row['instituicao_nome'];?>" placeholder="" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">VISITA ALGUM FAMILIAR COM FREQUÊNCIA?</th>
        <th>
          <input type="radio" name="socio_visitarfamiliar" <?=($row['visita_frequencia']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_visitarfamiliar" <?=($row['visita_frequencia']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL É O GRAU DE PARENTESCO?</th>
        <th>
          <input type="text" name="socio_visitarfamiliar2" value="<?=$row['visita_grauparentesco'];?>" placeholder="" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM ACESSO A HIGIENE PESSOAL?</th>
        <th>
          <input type="radio" name="socio_acessohigienepessoalopt" <?=($row['acesso_higiene']==0)?"checked":"";?> value="0"/> Sim</br>
          <input type="radio" name="socio_acessohigienepessoalopt" <?=($row['acesso_higiene']==1)?"checked":"";?> value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_acessohigienepessoalopt0" <?=($row['acesso_higiene']==0)?"checked":"";?> value="1"/> Banho</br>
          <input type="radio" name="socio_acessohigienepessoalopt1" <?=($row['acesso_higiene']==1)?"checked":"";?> value="1"/> Acesso ao Sanitário</br>
          <input type="radio" name="socio_acessohigienepessoalopt2" <?=($row['acesso_higiene']==2)?"checked":"";?> value="1"/> Higiene Bucal</br>
          <input type="radio" name="socio_acessohigienepessoalopt3" <?=($row['acesso_higiene']==3)?"checked":"";?> value="1"/> Outros
        </th>
      </tr>
    </thead>
  </table>
</div>
<input type="submit" class="button submit2" name="Atualizar" value="Atualizar"/>
</form>
<div class="spam"></div>
<div class="spam"></div>
<div class="spam"></div>
<?php 
		}
		}else{
			$_SESSION['mensagem'] = 'errorpessoa02';
			echo "<script>location.href='?p=pessoas&pg=$pg';</script>";
		}
	}else{
		$_SESSION['mensagem'] = 'errorpessoa01';
		echo "<script>location.href='?p=pessoas&pg=$pg';</script>";
	}
?>