<h2>Editando el <span class='muted'>puesto</span> seleccionado:</h2>
<br>

<?php echo render('puesto/_form'); ?>
<p>
	<?php echo Html::anchor('puesto/view/'.$puesto->id, 'Ver Ficha'); ?> |
	<?php echo Html::anchor('puesto', 'Volver'); ?></p>
