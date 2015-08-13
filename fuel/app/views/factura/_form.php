<?php
$provs = Model_Proveedor::find('all',array('select' => array('id', 'nombre'),'order_by' => 'nombre'));
$options[0]="-- SELECCIONA UN PROVEEDOR --";
foreach($provs as $prov){
    $options[$prov->get('id')]=$prov->get('nombre');
}

echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Selecciona proveedor', 'idprov', array('class'=>'control-label')); ?>
				<?php echo Form::select('idprov', isset($factura) ? $factura->idprov : '' , $options, array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Fecha de emisión', 'fecha', array('class'=>'control-label')); ?>
				<?php echo Form::input('fecha', Input::post('fecha', isset($factura) ? $factura->fecha : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fecha', 'type' => 'date')); ?>
		</div>
        <?php echo Form::input('total', Input::post('total', isset($factura) ? $factura->total : 0), array('class' => 'col-md-4 form-control','type'=>'hidden' )); ?>
        <div class="form-group">
            <?php echo Form::label('Comentario', 'comentario', array('class'=>'control-label')); ?>
            <?php echo Form::input('comentario', Input::post('comentario', isset($factura) ? $factura->comentario : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Comentario sobre la factura')); ?>
        </div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Completar líneas de factura', array('class' => 'btn btn-primary')); ?>
        </div>
	</fieldset>
<?php echo Form::close(); ?>