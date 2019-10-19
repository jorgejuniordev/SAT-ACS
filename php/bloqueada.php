<?php 
    if( ($db['sexo']=="Indefinido") || ($db['cartao_sus']=="") || ($db['ddd']=="") || ($db['telefone']=="") || ($db["cidade"]=="") || ($db["uf"]=="") || ($db["data_nascimento"]=="") ){ 
        header("Location:?p=atualizar");
    }
?>
<p>Sua conta está bloqueada.</p>
<p>Contate um <b><?=supervisor;?></b> para saber o motivo de bloqueio da conta.</p>
<a href="?p=logout">Sair</a>