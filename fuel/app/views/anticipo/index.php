<h2>Calcular un nuevo <span class='muted'>anticipo</span>:</h2>
<br>
<p>Seleccione al proveedor que quiera calcularle el anticipo:</p>

<?php if( isset($_POST['submit'])){
    \Fuel\Core\Session::_init();
    \Fuel\Core\Session::set('ses_anticipo_prov',$_POST['username']);
    Response::redirect('anticipo/calculo');
}
else {
    ?>


    <?php
    if ($proveedores):

        foreach ($proveedores as $p) {
            $provs[$p->get('id')] = $p->get('nombre');
        }

        echo Form::open('anticipo/index', array("class" => "form-horizontal")); ?>

        <fieldset>
            <div class="form-group">
                <?php echo Form::label('Nombre de usuario', 'username', array('class' => 'control-label')); ?>
                <?php echo Form::select('username', '', $provs, array('class' => 'col-md-4 form-control')); ?>
            </div>
            <br/>
            <br/>

            <div class="form-group">
                <label class='control-label'>&nbsp;</label>
                <?php echo Form::submit('submit', 'Calcular anticipo para este proveedor', array('class' => 'btn btn-primary')); ?>
            </div>
        </fieldset>
        <?php echo Form::close();


    else: ?>
        <p>No se han encontrado proveedores.</p>

    <?php endif;

}?>
