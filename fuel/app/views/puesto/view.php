<h2>Mostrando datos del puesto de <span class='muted'><?php echo $puesto->nombre; ?></span></h2>
<br/>
<p>
	<strong>Nombre del puesto de recogida:</strong>
	<?php echo $puesto->nombre; ?></p>
<br/>
<?php echo Html::anchor('puesto/edit/'.$puesto->id, 'Editar',array('class'=>'btn btn-success')); ?>&nbsp;
<?php echo Html::anchor('puesto', 'Volver',array('class'=>'btn btn-danger')); ?>