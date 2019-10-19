<?php 
	include_once 'include/functions_alerts.php';
    if(lembretesAlerts($db['id'])>0){
?>
<div id="notifications" class="img">
    <div class="desg bloggerspice bserror bstext" icon="exclamation-circle" title="Error message">
        <div class="message-wrapper">
        <div class="headertext">
        <i class="fa bloggerspice-icon fa-exclamation-circle"></i>NOTIFICAÇÃO [<?=lembretesAlerts($db['id']);?>]</div>
        Você possui <b><?=lembretesAlerts($db['id']);?></b> notificações importantes.</br>
        Precisamos que verifique todas elas para que ocorra tudo bem.</br></br>
        <a href="?p=notificacoes">
            <div class="notify">VISUALIZAR</div>
        </a>
        </div>
    </div>
</div>
<?php } ?>