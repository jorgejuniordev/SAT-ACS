<div id="menu-acs">
	<li class="pure-menu-item"><a href="?p=home" class="pure-menu-link">Inicio</a></li>



	

	<li class="pure-menu-item"><a href="#" class="pure-menu-link btn-toggle" data-element="#hover3">Pessoa</a></li>
	<div id="hover3" class="hovermenu" style="display:none;">
		<li class="pure-menu-item"><a href="?p=pessoas-criar" class="pure-menu-link"> - Adicionar Pessoa</a></li>
		<li class="pure-menu-item"><a href="?p=pessoas&pg=0" class="pure-menu-link"> - Visualizar Pessoas</a></li>
		<li class="pure-menu-item"><a href="?p=filtros" class="pure-menu-link"> - Filtros - PDF</a></li>
	</div>

	<li class="pure-menu-item"><a href="?p=notificacoes" class="pure-menu-link">Alertas <?php if(lembretesAlerts($db['id'])>0){ echo "<b>".lembretesAlerts($db['id'])."</b>"; }?></a></li>


<!--
		<br/><br/><br/>
	<li class="pure-menu-item"><a href="#" class="pure-menu-link btn-toggle" data-element="#hover4">Domicílio</a></li>
	<div id="hover4" class="hovermenu" style="display:none;">
		<li class="pure-menu-item"><a href="?p=domicilio" class="pure-menu-link"> - Visualizar Domicílios</a></li>
		<li class="pure-menu-item"><a href="?p=domicilio-criar" class="pure-menu-link"> - Criar Domicílios</a></li>
	</div>

	<li class="pure-menu-item"><a href="#" class="pure-menu-link btn-toggle" data-element="#hover5">Famílias</a></li>
	<div id="hover5" class="hovermenu" style="display:none;">
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Criar Residências</a></li>
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Visualizar Residências</a></li>
	</div>

	<li class="pure-menu-item"><a href="#" class="pure-menu-link btn-toggle" data-element="#hover6">Visitas</a></li>
	<div id="hover6" class="hovermenu" style="display:none;">
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Agendar Visitas</a></li>
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Visualizar Visitas</a></li>
	</div>

	<li class="pure-menu-item"><a href="#" class="pure-menu-link btn-toggle" data-element="#hover7">Alertas</a></li>
	<div id="hover7" class="hovermenu" style="display:none;">
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Criar Residências</a></li>
		<li class="pure-menu-item"><a href="#" class="pure-menu-link">Visualizar Residências</a></li>
	</div>
-->



	<li class="pure-menu-item"><a href="?p=logout" class="pure-menu-link">Sair</a></li>
</div>
