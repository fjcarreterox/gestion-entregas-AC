<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Proveedor', 'idprov', array('class'=>'control-label')); ?>

				<?php echo Form::input('idprov', Input::post('idprov', isset($factura) ? $factura->idprov : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Idprov')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Concepto', 'concepto', array('class'=>'control-label')); ?>

				<?php echo Form::input('concepto', Input::post('concepto', isset($factura) ? $factura->concepto : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Concepto')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Base imponible', 'base_imponible', array('class'=>'control-label')); ?>

				<?php echo Form::input('base_imponible', Input::post('base_imponible', isset($factura) ? $factura->base_imponible : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Base imponible')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('IVA', 'iva', array('class'=>'control-label')); ?>

				<?php echo Form::input('iva', Input::post('iva', isset($factura) ? $factura->iva : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Iva')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Retención aplicable', 'retencion', array('class'=>'control-label')); ?>

				<?php echo Form::input('retencion', Input::post('retencion', isset($factura) ? $factura->retencion : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Retencion')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Total', 'total', array('class'=>'control-label')); ?>

				<?php echo Form::input('total', Input::post('total', isset($factura) ? $factura->total : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Total')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Emitir', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>