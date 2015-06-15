<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nombre', 'nombre', array('class'=>'control-label')); ?>

				<?php echo Form::input('nombre', Input::post('nombre', isset($variedad) ? $variedad->nombre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nombre')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('En anticipo', 'en_anticipo', array('class'=>'control-label')); ?>

				<?php echo Form::input('en_anticipo', Input::post('en_anticipo', isset($variedad) ? $variedad->en_anticipo : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'En anticipo')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>