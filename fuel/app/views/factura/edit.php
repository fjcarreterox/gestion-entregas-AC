<h2>Editando la <span class='muted'>factura</span> seleccionada:</h2>
<br>
<?php echo render('factura/_form'); ?>
<p>
	<?php echo Html::anchor('factura/view/'.$factura->id, 'Ver'); ?> |
	<?php echo Html::anchor('factura/list', 'Volver'); ?></p>
