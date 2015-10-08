<?php
$anticipo_ops = array(0=>"NO",1=>"SÍ");

echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nombre de la variedad', 'nombre', array('class'=>'control-label')); ?>
			<?php echo Form::input('nombre', Input::post('nombre', isset($variedad) ? $variedad->nombre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nombre')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('En anticipo', 'en_anticipo', array('class'=>'control-label')); ?>
			<?php echo Form::select('en_anticipo', Input::post('en_anticipo', isset($variedad) ? $variedad->en_anticipo : ''),$anticipo_ops, array('class' => 'col-md-4 form-control', 'placeholder'=>'En anticipo')); ?>
		</div>
        <br/>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::button('submit', '<span class="glyphicon glyphicon-save"></span> Guardar Cambios', array('class' => 'btn btn-primary','type'=>'submit')); ?>
        </div>
	</fieldset>
<?php echo Form::close(); ?>