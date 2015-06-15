<h2>Viewing <span class='muted'>#<?php echo $variedad->id; ?></span></h2>

<p>
	<strong>Nombre:</strong>
	<?php echo $variedad->nombre; ?></p>
<p>
	<strong>En anticipo:</strong>
	<?php echo $variedad->en_anticipo; ?></p>

<?php echo Html::anchor('variedad/edit/'.$variedad->id, 'Edit'); ?> |
<?php echo Html::anchor('variedad', 'Back'); ?>