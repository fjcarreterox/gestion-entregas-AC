<?php echo Form::open('entrega/diaria', array("class" => "form-horizontal"));?>

<p>Listamos las entradas de hoy <b><?php echo date('d/m/Y');?></b> para el puesto de <b><?php echo Model_Puesto::find($idpuesto)->get('nombre');?></b>.</p>
    <fieldset>
        <br/>
        <br/>

        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Ver entrada del día de hoy', array('class' => 'btn btn-primary')); ?>
            <?php echo Form::submit('date', 'Ver entrada de otra fecha', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
<?php echo Form::close(); ?>