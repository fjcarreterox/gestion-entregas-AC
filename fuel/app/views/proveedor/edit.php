<h2>Editando los datos del <span class='muted'>Proveedor</span></h2>
<br>

<?php echo render('proveedor/_form'); ?>
<p>
	<?php echo Html::anchor('proveedor/view/'.$proveedor->id, 'Ver ficha'); ?> |
	<?php echo Html::anchor('proveedor', 'Volver'); ?></p>
