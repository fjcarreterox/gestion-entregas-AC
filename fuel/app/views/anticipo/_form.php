<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Fecha', 'fecha', array('class'=>'control-label')); ?>

				<?php echo Form::input('fecha', Input::post('fecha', isset($anticipo) ? $anticipo->fecha : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fecha')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Idprov', 'idprov', array('class'=>'control-label')); ?>

				<?php echo Form::input('idprov', Input::post('idprov', isset($anticipo) ? $anticipo->idprov : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Idprov')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Numcheque', 'numcheque', array('class'=>'control-label')); ?>

				<?php echo Form::input('numcheque', Input::post('numcheque', isset($anticipo) ? $anticipo->numcheque : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Numcheque')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Idbanco', 'idbanco', array('class'=>'control-label')); ?>

				<?php echo Form::input('idbanco', Input::post('idbanco', isset($anticipo) ? $anticipo->idbanco : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Idbanco')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Cuantia', 'cuantia', array('class'=>'control-label')); ?>

				<?php echo Form::input('cuantia', Input::post('cuantia', isset($anticipo) ? $anticipo->cuantia : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Cuantia')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Recogido', 'recogido', array('class'=>'control-label')); ?>

				<?php echo Form::input('recogido', Input::post('recogido', isset($anticipo) ? $anticipo->recogido : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Recogido')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>