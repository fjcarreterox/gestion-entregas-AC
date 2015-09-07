<h2>Editando la <span class='muted'>Entrega</span> seleccionada:</h2>
<br>
<?php echo render('entrega/_form'); ?>
<p>
	<?php echo Html::anchor('entrega/view/'.$entrega->id, '<span class="glyphicon glyphicon-eye-open"></span> Ver', array('class' => 'btn btn-default')); ?>&nbsp;
	<?php echo Html::anchor('entrega/list', '<span class="glyphicon glyphicon-backward"></span> Volver',array('class'=>'btn btn-danger')); ?></p>
