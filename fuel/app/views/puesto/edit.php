<h2>Editando datos del <span class='muted'>puesto</span> seleccionado:</h2>
<br/>
<?php echo render('puesto/_form'); ?>
<p><?php echo Html::anchor('puesto/view/'.$puesto->id, 'Ver Ficha',array('class'=>'btn btn-default')); ?>&nbsp;
	<?php echo Html::anchor('puesto', 'Volver',array('class'=>'btn btn-danger')); ?></p>
