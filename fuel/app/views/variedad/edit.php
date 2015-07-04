<h2>Editando los datos de la <span class='muted'>variedad</span> seleccionada:</h2>
<br>

<?php echo render('variedad/_form'); ?>
<p>
	<?php echo Html::anchor('variedad/view/'.$variedad->id, 'Ver Datos'); ?> |
	<?php echo Html::anchor('variedad', 'Volver'); ?></p>
