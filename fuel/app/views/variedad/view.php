<h2>Mostrando detalle de la variedad seleccionada:</h2>

<p>
	<strong>Nombre:</strong>
	<?php echo $variedad->nombre; ?></p>
<p>
	<strong>En anticipo:</strong>
	<?php echo $variedad->en_anticipo; ?></p>

<?php echo Html::anchor('variedad/edit/'.$variedad->id, 'Editar datos'); ?> |
<?php echo Html::anchor('variedad', 'Volver'); ?>