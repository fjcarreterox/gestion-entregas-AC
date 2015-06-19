<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<p>Escribe el nombre del proveedor que deseas buscar (al menos tres caracteres):</p>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nombre', 'nombre', array('class'=>'control-label')); ?>

				<?php echo Form::input('nombre', Input::post('nombre', isset($proveedor) ? $proveedor->nombre : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nombre')); ?>

		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Buscar', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>