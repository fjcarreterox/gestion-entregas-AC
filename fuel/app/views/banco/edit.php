<h2>Editando el <span class='muted'>banco</span> seleccionado:</h2>
<br>

<?php echo render('banco/_form'); ?>
<p>
	<?php echo Html::anchor('banco/view/'.$banco->id, 'Ver Ficha'); ?> |
	<?php echo Html::anchor('banco', 'Volver'); ?></p>
