<?php 
  if(verificarSupervisor($db)>=0){ 
    include_once ('require/add-pessoas.php');
?>
<form method="POST" action="">
  <center><H1>CADASTRO INDIVIDUAL</H1></center>
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
      <th><input type="text" name="nomecompleto" placeholder="Digite o nome completo" class="input5" maxlength="100" required/></th>
      <th class="reduz">NOME SOCIAL:</th>
      <th><input type="text" name="nomesocial" placeholder="Digite o nome social" class="input5" maxlength="100" /></th>
    </tr>		
    <tr>
     <th class="reduz">DATA DE NASCIMENTO:<b>*</b></th>
     <th><input type="date" name="datanascimento" class="input5" required/></th>
     <th class="reduz">SEXO:<b>*</b></th>
     <th>
      <input type="radio" name="sexo" value="0" required/> Masculino  
      <input type="radio" name="sexo" value="1" required/> Feminino
    </th>
  </tr>
  <tr>
    <th class="reduz">RAÇA/COR:<b>*</b></th>
    <th>
      <input type="radio" name="raca" value="0" required/> Branca  </br>
      <input type="radio" name="raca" value="1" required/> Preta </br>
      <input type="radio" name="raca" value="2" required/> Parda </br>
      <input type="radio" name="raca" value="3" required/> Amarela </br>
      <input type="radio" name="raca" value="4" required/> Indígena</br>
    </th>
    <th class="reduz">Nº NIS (PIS/PASEP):</th>
    <th>
      <input type="text" name="nis" placeholder="Digite o número NIS (PIS/PASEP)" class="input5" maxlength="20"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">NOME COMPLETO DA MÃE:</th>
    <th>
      <input type="text" name="nomecompletomae" placeholder="Digite o nome da mãe completo" class="input5" maxlength="100"/></br>
    </th>
    <th class="reduz">NACIONALIDADE:<b>*</b></th>
    <th>
      <input type="radio" name="nacionalidade" value="0" required> Brasileira 
      <input type="radio" name="nacionalidade" value="1" required/> Naturalizado 
      <input type="radio" name="nacionalidade" value="2" required/> Estrangeiro
    </th>
  </tr>
  <tr>
    <th class="reduz">PAÍS DE NASCIMENTO:</th>
    <th><input type="text" name="pais" placeholder="Digite o país de nascimento" class="input5" maxlength="100"/></th>
    <th class="reduz">TELEFONE CELULAR:</th>
    <th>
      <input type="text" name="ddd" placeholder="DDD" class="input3" maxlength="3"/>
      <input type="text" name="telefone" placeholder="Telefone" class="input6" maxlength="15"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">MUNICÍPIO E UF DE NASCIMENTO:<b>*</b></th>
    <th>
      <input type="text" name="uf" placeholder="UF" class="input3" maxlength="2" required/>
      <input type="text" name="municipio" placeholder="Municipio" class="input6" maxlength="15" required/>
    </th>
    <th class="reduz">E-MAIL:</th>
    <th>
      <input type="email" name="email" placeholder="Digite o e-mail" class="input5" maxlength="60"/>
    </th>
  </tr>
  <tr>
    <th class="reduz">Nº DO CARTÃO SUS:<b>*</b></th>
    <th><input type="text" name="cartaosus" placeholder="Digite o número do cartão do sus" class="input5" maxlength="15" required/></th>
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
        <input type="radio" name="responsavel" value="0"> Sim 
        <input type="radio" name="responsavel" value="1"/> Não
      </th>
      <th class="reduz">Nº DO CARTÃO SUS:</th>
      <th><input type="text" name="responsavel_cardsus" placeholder="Digite o número do cartão do sus do responsável" class="input5" maxlength="15"/></th>
    </tr>   
    <tr>
      <th class="reduz">DATA DE NASCIMENTO DO RESPONSÁVEL FAMILIAR:</th>
      <th><input type="date" name="responsavel_datanascimento" class="input5"/></th>
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
          <input type="radio" name="socio_relacaoresponsavel" value="0"> Cônjuge / Comapnheiro(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" value="1"/> Filho(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" value="2"/> Enteado(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" value="3"/> Enteado(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" value="4"/> Pai / Mãe</br>
          <input type="radio" name="socio_relacaoresponsavel" value="5"/> Sogro(a)</br>
          <input type="radio" name="socio_relacaoresponsavel" value="6"/> Irmão / Irmã</br>
          <input type="radio" name="socio_relacaoresponsavel" value="7"/> Genro / Nora</br>
          <input type="radio" name="socio_relacaoresponsavel" value="8"/> Outro parente</br>
          <input type="radio" name="socio_relacaoresponsavel" value="9"/> Não parente
        </th>
        <th class="reduz">OCUPAÇÃO:</th>
        <th>
          <input type="text" name="socio_relacaoresponsavel_ocupacao" placeholder="Digite a ocupação do responsável" class="input5" maxlength="255"/>
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
          <input type="radio" name="socio_frequentacreche" value="0" required> Sim</br>
          <input type="radio" name="socio_frequentacreche" value="1" required/> Não
        </th>
        <th class="reduz">QUAL É O CURSO MAIS ELEVADO QUE FREQUENTA OU FREQUENTOU?</th>
        <th>
          <input type="radio" name="socio_frequentacurso" value="0"> Creche</br>
          <input type="radio" name="socio_frequentacurso" value="1"/> Pré-escola (exceto CA)</br>
          <input type="radio" name="socio_frequentacurso" value="2"/> Classe Alfabetizada - CA</br>
          <input type="radio" name="socio_frequentacurso" value="3"/> Ensino Fundamental 1ª a 4ª séries</br>
          <input type="radio" name="socio_frequentacurso" value="4"/> Ensino Fundamental 5ª a 8ª séries</br>
          <input type="radio" name="socio_frequentacurso" value="5"/> Ensino Fundamental Completo</br>
          <input type="radio" name="socio_frequentacurso" value="6"/> Ensino Fundamental Especial</br>
          <input type="radio" name="socio_frequentacurso" value="7"/> Ensino Fundamental EJA - séries iniciais (Supletivo 1ª a 4ª)</br>
          <input type="radio" name="socio_frequentacurso" value="8"/> Ensino Fundamental EJA - séries finais (Supletivo 5ª a 9ª)</br>
          <input type="radio" name="socio_frequentacurso" value="9"/> Ensino Médio, Médio 2º Ciclo (Científico, Técnico e etc)</br>
          <input type="radio" name="socio_frequentacurso" value="10"/> Ensino Médio Especial</br>
          <input type="radio" name="socio_frequentacurso" value="11"/> Ensino Médio EJA (Supletivo)</br>
          <input type="radio" name="socio_frequentacurso" value="12"/> Superior, Aperfeiçoamento, Especialização, Mestrado,Doutorado</br>
          <input type="radio" name="socio_frequentacurso" value="13"/> Alfabetização para Adultos (Mobral, etc)</br>
          <input type="radio" name="socio_frequentacurso" value="14"/> Nenhum
        </th>
      </tr>  
      <tr>
        <th class="reduz">SITUAÇÃO NO MERCADO DE TRABALHO</th>
        <th>
          <input type="radio" name="socio_situacaotrabalho" value="0"/> Empregador</br>
          <input type="radio" name="socio_situacaotrabalho" value="1"/> Assalariado com carteira de trabalho</br>
          <input type="radio" name="socio_situacaotrabalho" value="2"/> Assalariado sem carteira de trabalho</br>
          <input type="radio" name="socio_situacaotrabalho" value="3"/> Autônomo com previdência social</br>
          <input type="radio" name="socio_situacaotrabalho" value="4"/> Autônomo sem previdência social</br>
          <input type="radio" name="socio_situacaotrabalho" value="5"/> Aposentado/Pensionista</br>
          <input type="radio" name="socio_situacaotrabalho" value="6"/> Desempregado</br>
          <input type="radio" name="socio_situacaotrabalho" value="7"/> Não trabalha</br>
          <input type="radio" name="socio_situacaotrabalho" value="8"/> Outro
        </th>
        <th class="reduz">CRIANÇAS DE 0 A 9 ANOS, COM QUEM FICA?</th>
        <th>
          <input type="radio" name="socio_criancaficam" value="0"/> Adulto Responsável</br>
          <input type="radio" name="socio_criancaficam" value="1"/> Outra(s) Criança(s)</br>
          <input type="radio" name="socio_criancaficam" value="2"/> Adolescente</br>
          <input type="radio" name="socio_criancaficam" value="3"/> Sozinha</br>
          <input type="radio" name="socio_criancaficam" value="4"/> Creche</br>
          <input type="radio" name="socio_criancaficam" value="5"/> Outro
        </th>
      </tr> 
      <tr>
        <th class="reduz">FREQUENTA CUIDADOR TRADICIONAL?</th>
        <th>
          <input type="radio" name="socio_frequentacuidador" value="0"/> Sim</br>
          <input type="radio" name="socio_frequentacuidador" value="1"/> Não
        </th>
        <th class="reduz">PARTICIPA DE ALGUM GRUPO COMUNITÁRIO?</th>
        <th>
          <input type="radio" name="socio_grupocomunitario" value="0"/> Sim</br>
          <input type="radio" name="socio_grupocomunitario" value="1"/> Não
        </th>
      </tr> 
      <tr>
        <th class="reduz">POSSUI PLANO DE SAÚDE PRIVADO?</th>
        <th>
          <input type="radio" name="socio_planosaudeprivado" value="0"/> Sim</br>
          <input type="radio" name="socio_planosaudeprivado" value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>   
      <tr>
        <th class="reduz">É MEMBRO DE POVO OU COMUNIDADE TRADICIONAL?</th>
        <th>
          <input type="radio" name="socio_comunidadetradicional" value="0"/> Sim</br>
          <input type="radio" name="socio_comunidadetradicional" value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="text" name="socio_comunidadetradicionalnome" placeholder="Digite o nome da comunidade tradicional" class="input5" maxlength="255"/>
        </th>
      </tr>  
      <tr>
        <th class="reduz">DESEJA INFORMAR ORIENTAÇÃO SEXUAL / IDENTIDADE DE GÊNERO?</th>
        <th>
          <input type="radio" name="socio_orientacaosexual" value="0"/> Sim</br>
          <input type="radio" name="socio_orientacaosexual" value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="radio" name="socio_orientacaosexualopt" value="0"/> Heterossexual</br>
          <input type="radio" name="socio_orientacaosexualopt" value="1"/> Gay</br>
          <input type="radio" name="socio_orientacaosexualopt" value="2"/> Lésbica</br>
          <input type="radio" name="socio_orientacaosexualopt" value="3"/> Travesti</br>
          <input type="radio" name="socio_orientacaosexualopt" value="4"/> Bissexual</br>
          <input type="radio" name="socio_orientacaosexualopt" value="5"/> Travesti</br>
          <input type="radio" name="socio_orientacaosexualopt" value="6"/> Transsexual</br>
          <input type="radio" name="socio_orientacaosexualopt" value="7"/> Outro
        </th>
      </tr> 
      <tr>
        <th class="reduz">TEM ALGUMA DEFICIÊNCIA?<b>*</b></th>
        <th>
          <input type="radio" name="socio_deficiencia" value="0" required/> Sim</br>
          <input type="radio" name="socio_deficiencia" value="1" required checked/> Não
        </th>
        <th class="reduz">SE SIM, QUAL?</th>
        <th>
          <input type="radio" name="socio_deficienciaopt" value="0"/> Auditiva</br>
          <input type="radio" name="socio_deficienciaopt" value="1"/> Visual</br>
          <input type="radio" name="socio_deficienciaopt" value="2"/> Intelectual/Cognitiva</br>
          <input type="radio" name="socio_deficienciaopt" value="3"/> Física</br>
          <input type="radio" name="socio_deficienciaopt" value="4"/> Outra
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
          <input type="radio" name="socio_gestante" value="0"/> Sim</br>
          <input type="radio" name="socio_gestante" value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL É A MATERNIDADE DE REFERÊNCIA?</th>
        <th>
          <input type="text" name="socio_gestanteref" placeholder="Digite o nome da maternidade" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">SOBRE SEU PESO, VOCÊ SE CONSIDERA?</th>
        <th>
          <input type="radio" name="socio_pesoopt" value="0"/> Abaixo do Peso </br>
          <input type="radio" name="socio_pesoopt" value="1"/> Peso Adequado </br>
          <input type="radio" name="socio_pesoopt" value="2"/> Acima do Peso
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ FUMANTE?</th>
        <th>
          <input type="radio" name="socio_fumanteopt" value="0"/> Sim </br>
          <input type="radio" name="socio_fumanteopt" value="1"/> Não
        </th>
        <th class="reduz">FAZ USO DE ÁLCOOL?</th>
        <th>
          <input type="radio" name="socio_alcoolopt" value="0"/> Sim </br>
          <input type="radio" name="socio_alcoolopt" value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">FAZ USO DE OUTRAS DROGAS?</th>
        <th>
          <input type="radio" name="socio_drogasopt" value="0"/> Sim </br>
          <input type="radio" name="socio_drogasopt" value="1"/> Não
        </th>
        <th class="reduz">TEM HIPERTENSÃO ARTERIAL?</th>
        <th>
          <input type="radio" name="socio_arterialopt" value="0"/> Sim </br>
          <input type="radio" name="socio_arterialopt" value="1"/> Não
        </th>
      </tr>
      
      <tr>
        <th class="reduz">TEM DIABETES?</th>
        <th>
          <input type="radio" name="socio_diabetesopt" value="0"/> Sim </br>
          <input type="radio" name="socio_diabetesopt" value="1"/> Não
        </th>
        <th class="reduz">TEVE AVC / DERRAME?</th>
        <th>
          <input type="radio" name="socio_avcderrameopt" value="0"/> Sim </br>
          <input type="radio" name="socio_avcderrameopt" value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">TEVE INFARTO?</th>
        <th>
          <input type="radio" name="socio_infartoopt" value="0"/> Sim </br>
          <input type="radio" name="socio_infartoopt" value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">TEM DOENÇA CARDÍACA / DO CORAÇÃO?</th>
        <th>
          <input type="radio" name="socio_cardiacaopt" value="0"/> Sim </br>
          <input type="radio" name="socio_cardiacaopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_cardiacaopt2" value="0"/> Insuficiência Cardíaca</br>
          <input type="radio" name="socio_cardiacaopt2" value="1"/> Outro</br>
          <input type="radio" name="socio_cardiacaopt2" value="2"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM OU TEVE PROBLEMAS NOS RINS?</th>
        <th>
          <input type="radio" name="socio_rinsopt" value="0"/> Sim </br>
          <input type="radio" name="socio_rinsopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_rinsopt2" value="0"/> Insuficiência Renal</br>
          <input type="radio" name="socio_rinsopt2" value="1"/> Outro</br>
          <input type="radio" name="socio_rinsopt2" value="2"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM DOENÇA RESPIRATÓRIA / NO PULMÃO?</th>
        <th>
          <input type="radio" name="socio_respiratoriaopt" value="0"/> Sim </br>
          <input type="radio" name="socio_respiratoriaopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_respiratoriaopt2" value="0"/> Asma</br>
          <input type="radio" name="socio_respiratoriaopt2" value="1"/> DPOC/Enfisema</br>
          <input type="radio" name="socio_respiratoriaopt2" value="2"/> Outro</br>
          <input type="radio" name="socio_respiratoriaopt2" value="3"/> Não Sabe
        </th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ COM HANSENÍASE?</th>
        <th>
          <input type="radio" name="socio_hanseniaseopt" value="0"/> Sim </br>
          <input type="radio" name="socio_hanseniaseopt" value="1"/> Não
        </th>
        <th class="reduz">ESTÁ COM TUBERCULOSE?</th>
        <th>
          <input type="radio" name="socio_tuberculoseopt" value="0"/> Sim </br>
          <input type="radio" name="socio_tuberculoseopt" value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM OU TEVE CÂNCER?</th>
        <th>
          <input type="radio" name="socio_canceropt" value="0"/> Sim </br>
          <input type="radio" name="socio_canceropt" value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      
      <tr>
        <th class="reduz">TEVE ALGUMA INTERNAÇÃO NOS ÚLTIMOS 12 MESES?</th>
        <th>
          <input type="radio" name="socio_internacaoopt" value="0"/> Sim </br>
          <input type="radio" name="socio_internacaoopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, POR QUAL CAUSA?</h9></th>
        <th>
          <input type="text" name="socio_internacaooptcausa" placeholder="Digite a causa" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">FEZ OU FAZ TRATAMENTO COM PSIQUIATRA OU TEVE INTERNAÇÃO POR PROBLEMA DE SAÚDE MENTAL?</th>
        <th>
          <input type="radio" name="socio_psiquiatraopt" value="0"/> Sim </br>
          <input type="radio" name="socio_psiquiatraopt" value="1"/> Não
        </th>
        <th class="reduz">ESTÁ ACAMADO?</th>
        <th>
          <input type="radio" name="socio_acamadoopt" value="0"/> Sim </br>
          <input type="radio" name="socio_acamadoopt" value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">ESTÁ DOMICILIADO?</th>
        <th>
          <input type="radio" name="socio_domiciliadoopt" value="0"/> Sim </br>
          <input type="radio" name="socio_domiciliadoopt" value="1"/> Não
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">USA PLANTAS MEDICINAIS?</th>
        <th>
          <input type="radio" name="socio_plantasopt" value="0"/> Sim </br>
          <input type="radio" name="socio_plantasopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="text" name="socio_plantasopt2" placeholder="Informe quais plantas medicinais" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">USA OUTRAS PRÁTICAS INTEGRATIVAS E COMPLEMENTARES?</th>
        <th>
          <input type="radio" name="socio_praticasintegrativasopt1" value="0"/> Sim </br>
          <input type="radio" name="socio_praticasintegrativasopt1" value="1"/> Não
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
          <input type="text" name="socio_praticasintegrativasopt2" placeholder="" class="input5" maxlength="255"/>
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">2 - QUAL?</th>
        <th>
          <input type="text" name="socio_praticasintegrativasopt3" placeholder="" class="input5" maxlength="255"/>
        </th>
        <th class="reduz"></th><th></th>
      </tr>
      <tr>
        <th class="reduz">3 - QUAL?</th>
        <th>
          <input type="text" name="socio_praticasintegrativasopt4" placeholder="" class="input5" maxlength="255"/>
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
          <input type="radio" name="socio_situacaoruaopt1" value="0" required/> Sim </br>
          <input type="radio" name="socio_situacaoruaopt1" value="1" required checked/> Não
        </th>
        <th class="reduz">TEMPO EM SITUAÇÃO DE RUA?</th>
        <th>
          <input type="radio" name="socio_situacaoruaopt2" value="0"/> < 6 meses</br>
          <input type="radio" name="socio_situacaoruaopt2" value="2"/> 6 a 12 meses</br>
          <input type="radio" name="socio_situacaoruaopt2" value="3"/> 1 a 5 anos</br>
          <input type="radio" name="socio_situacaoruaopt2" value="4" /> 5 anos
        </th>
      </tr>
      <tr>
        <th class="reduz">RECEBE ALGUM BENEFÍCIO?</th>
        <th>
          <input type="radio" name="socio_beneficioopt" value="0"/> Sim </br>
          <input type="radio" name="socio_beneficioopt" value="1"/> Não
        </th>
        <th class="reduz">POSSUI REFERÊNCIA FAMILIAR?</th>
        <th>
          <input type="radio" name="socio_referenciafamiliaropt" value="0"/> Sim </br>
          <input type="radio" name="socio_referenciafamiliaropt" value="1"/> Não
        </th>
      </tr>
      <tr>
        <th class="reduz">QUANTAS VEZES SE ALIMENTA AO DIA?</th>
        <th>
          <input type="radio" name="socio_numalimentacao" value="0"/> 1 vez</br>
          <input type="radio" name="socio_numalimentacao" value="1"/> 2 ou 3 vezes</br>
          <input type="radio" name="socio_numalimentacao" value="2"/> mais de 3 vezes
        </th>
        <th class="reduz">QUAL A ORIGEM DA ALIMENTAÇÃO?</th>
        <th>
          <input type="radio" name="socio_alimentacaoopt" value="0"/> Restaurante Popular</br>
          <input type="radio" name="socio_alimentacaoopt" value="1"/> Doação Restaurante</br>
          <input type="radio" name="socio_alimentacaoopt" value="2"/> Doação Grupo Religioso</br>
          <input type="radio" name="socio_alimentacaoopt" value="3"/> Doação de Popular</br>
          <input type="radio" name="socio_alimentacaoopt" value="4"/> Outros
        </th>
      </tr>
      <tr>
        <th class="reduz">É ACOMPANHADO POR OUTRA INSTITUIÇÃO?</th>
        <th>
          <input type="radio" name="socio_acompanhadoinstopt" value="0"/> Sim</br>
          <input type="radio" name="socio_acompanhadoinstopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="text" name="socio_acompanhadoinstopt2" placeholder="" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">VISITA ALGUM FAMILIAR COM FREQUÊNCIA?</th>
        <th>
          <input type="radio" name="socio_visitarfamiliar" value="0"/> Sim</br>
          <input type="radio" name="socio_visitarfamiliar" value="1"/> Não
        </th>
        <th class="reduz">SE SIM, QUAL É O GRAU DE PARENTESCO?</th>
        <th>
          <input type="text" name="socio_visitarfamiliar2" placeholder="" class="input5" maxlength="255"/>
        </th>
      </tr>
      <tr>
        <th class="reduz">TEM ACESSO A HIGIENE PESSOAL?</th>
        <th>
          <input type="radio" name="socio_acessohigienepessoalopt" value="0"/> Sim</br>
          <input type="radio" name="socio_acessohigienepessoalopt" value="1"/> Não
        </th>
        <th class="reduz"><h9>SE SIM, INDIQUE QUAL(IS).</h9></th>
        <th>
          <input type="radio" name="socio_acessohigienepessoalopt0" value="1"/> Banho</br>
          <input type="radio" name="socio_acessohigienepessoalopt1" value="1"/> Acesso ao Sanitário</br>
          <input type="radio" name="socio_acessohigienepessoalopt2" value="1"/> Higiene Bucal</br>
          <input type="radio" name="socio_acessohigienepessoalopt3" value="1"/> Outros
        </th>
      </tr>
    </thead>
  </table>
</div>
<input type="submit" class="button submit2" name="Adicionar" value="Adicionar"/>
</form>
<div class="spam"></div>
<div class="spam"></div>
<div class="spam"></div>
<?php } ?>