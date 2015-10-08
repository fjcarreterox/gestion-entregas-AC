<h2>Mostrando detalle de la <span class="muted">variedad</span> seleccionada</h2>
<br/>
<p>
	<strong>Nombre:</strong>
	<?php echo $variedad->nombre; ?></p>
<p>
	<strong>En anticipo:</strong>
	<?php
    if($variedad->en_anticipo){echo "SÍ"; }
    else{echo "NO"; }
    ?></p>
<br/>
<?php echo Html::anchor('variedad/edit/'.$variedad->id, '<span class="glyphicon glyphicon-pencil"></span> Editar datos', array('class' => 'btn btn-success')); ?>
<?php echo Html::anchor('variedad', '<span class="glyphicon glyphicon-backward"></span> Volver', array('class' => 'btn btn-danger')); ?>