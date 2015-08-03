<?php if(isset($_POST["submit"])){
    Response::redirect('entrega/list_prov/'.$_POST["idprov"]);
}
else {
    echo "<h2 > Selecciona a un proveedor para ver su ficha final:</h2 >";
    $provs[0] = "-- SELECCIONA UN PROVEEDOR --";
    foreach ($proveedores as $p) {
        $provs[$p->get('id')] = $p->get('nombre');
    }
    echo Form::open('entrega/init', array("class" => "form-horizontal")); ?>

    <fieldset>
        <div class="form-group">
            <?php echo Form::select('idprov', '', $provs, array('class' => 'col-md-4 form-control')); ?>
        </div>
        <br/>
        <br/>

        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Consultar su ficha final', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
    <?php echo Form::close();
}?>