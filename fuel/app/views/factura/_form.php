<?php
$provs = Model_Proveedor::find('all',array('select' => array('id', 'nombre', 'tipo'),'order_by' => 'nombre'));
foreach($provs as $prov){
    $options[$prov->get('id')]=$prov->get('nombre');
    $tipos[$prov->get('id')]=$prov->get('tipo');
}

$ivas = array(
    4 => '4%',
    12 => '12%'
);

echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Selecciona proveedor', 'idprov', array('class'=>'control-label')); ?>

				<?php echo Form::select('idprov', isset($factura) ? $factura->idprov : '' , $options, array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Concepto', 'concepto', array('class'=>'control-label')); ?>

				<?php echo Form::input('concepto', Input::post('concepto', isset($factura) ? $factura->concepto : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Concepto de la factura')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Base imponible &euro;', 'base_imponible', array('class'=>'control-label')); ?>

				<?php echo Form::input('base_imponible', Input::post('base_imponible', isset($factura) ? $factura->base_imponible : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Base imponible')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('%IVA', 'iva', array('class'=>'control-label')); ?>

				<?php echo Form::select('iva', isset($factura) ? $factura->iva : '', $ivas, array('class' => 'col-md-4 form-control', 'placeholder'=>'Iva')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Retención aplicable (%)', 'retencion', array('class'=>'control-label')); ?>

				<?php echo Form::input('retencion', Input::post('retencion', isset($factura) ? $factura->retencion : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Retención a aplicar')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Total &euro;', 'total', array('class'=>'control-label')); ?>

				<?php echo Form::input('total', Input::post('total', isset($factura) ? $factura->total : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Total a facturar')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Emitir factura', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>