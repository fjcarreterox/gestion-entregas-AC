<h2>Mostrando datos del puesto de <span class='muted'><?php echo $puesto->nombre; ?></span></h2>

<p>
	<strong>Nombre:</strong>
	<?php echo $puesto->nombre; ?></p>

<?php echo Html::anchor('puesto/edit/'.$puesto->id, 'Editar'); ?> |
<?php echo Html::anchor('puesto', 'Volver'); ?>