<?php echo Form::open('entrega/diaria', array("class" => "form-horizontal"));
foreach ($puestos as $p) {
    $options[$p->get('id')] = $p->get('nombre');
}

?>
<p>Selecciona el puesto que deseas consultar:</p>
    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Puesto de entrega', 'idpuesto', array('class' => 'control-label')); ?>
            <?php echo Form::select('idpuesto', '', $options, array('class' => 'col-md-4 form-control')); ?>
        </div>
        <br/>
        <br/>

        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Ver entrada del día de hoy', array('class' => 'btn btn-primary')); ?>
            <?php echo Form::submit('date', 'Ver entrada de otra fecha', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
<?php echo Form::close(); ?>