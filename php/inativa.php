<?php 
    if( ($db['sexo']=="Indefinido") || ($db['cartao_sus']=="") || ($db['ddd']=="") || ($db['telefone']=="") || ($db["cidade"]=="") || ($db["uf"]=="") || ($db["data_nascimento"]=="") ){ 
        header("Location:?p=atualizar");
    }
?>
<p>Sua conta no momento está inativa.</p>
<p>Espere até que um <b><?=supervisor;?></b> verifique seu status e o ative.</p>
<a href="?p=logout">Sair</a>