<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Idalbaran', 'idalbaran', array('class'=>'control-label')); ?>

				<?php echo Form::input('idalbaran', Input::post('idalbaran', isset($albaran) ? $albaran->idalbaran : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Idalbaran')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Identrega', 'identrega', array('class'=>'control-label')); ?>

				<?php echo Form::input('identrega', Input::post('identrega', isset($albaran) ? $albaran->identrega : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Identrega')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Idproveedor', 'idproveedor', array('class'=>'control-label')); ?>

				<?php echo Form::input('idproveedor', Input::post('idproveedor', isset($albaran) ? $albaran->idproveedor : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Idproveedor')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>