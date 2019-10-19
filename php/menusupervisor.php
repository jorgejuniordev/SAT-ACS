<?php if(verificarSupervisor($db)==2){  ?>
	<li class="pure-menu-item">
		<a href="#" class="pure-menu-link admin btn-toggle" id="admin" data-element="#hover">Administrar</a>
	</li>
	<div id="hover" style="display:none;">
		<li class="pure-menu-item">
			<a href="?p=administrar&gerenciar=cargos&pg=0" class="pure-menu-link admin" id="admin-sub">Gerenciar Cargos</a>
		</li>

		<li class="pure-menu-item">
			<a href="?p=administrar&gerenciar=localidades" class="pure-menu-link admin" id="admin-sub">Gerenciar Localidades</a>
		</li>
	</div>
<?php } ?>

<li class="pure-menu-item">
	<a href="#" class="pure-menu-link admin btn-toggle" id="supervisor" data-element="#hover2">Supervisionar</a>
</li>
	<div id="hover2" style="display:none;">
		<li class="pure-menu-item">
			<a href="?p=homesupervisor" class="pure-menu-link admin" id="supervisor-sub">Visualizar Gráficos</a>
		</li>

		<li class="pure-menu-item">
			<a href="?p=supervisionar" class="pure-menu-link admin" id="supervisor-sub">Pesquisar Conta</a>
		</li>

		<li class="pure-menu-item">
			<a href="?p=supervisionar-lista&list=1&pg=0" class="pure-menu-link admin" id="supervisor-sub">Contas inativas</a>
		</li>

		<li class="pure-menu-item">
			<a href="?p=supervisionar-lista&list=2&pg=0" class="pure-menu-link admin" id="supervisor-sub">Contas ativas</a>
		</li>

		<li class="pure-menu-item">
			<a href="?p=supervisionar-lista&list=3&pg=0" class="pure-menu-link admin" id="supervisor-sub"> Contas bloqueadas</a>
		</li>
	</div>

<?php require_once 'menuacs.php'; ?>

