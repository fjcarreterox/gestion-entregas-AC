<h2>Editando los datos de la <span class='muted'>variedad</span> seleccionada</h2>
<br/>
<?php echo render('variedad/_form'); ?>
<p><?php echo Html::anchor('variedad/view/'.$variedad->id, '<span class="glyphicon glyphicon-eye-open"></span> Ver Datos',array('class'=>'btn btn-default')); ?>
	<?php echo Html::anchor('variedad', '<span class="glyphicon glyphicon-backward"></span> Volver',array('class'=>'btn btn-danger')); ?></p>
