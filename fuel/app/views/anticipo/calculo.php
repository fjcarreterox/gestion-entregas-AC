<h2>Calcular un nuevo <span class='muted'>anticipo</span>:</h2>
<br>
<p>A continuación aparecer el cálculo automático realizado por el sistema:</p>
<br/>
<?php if( isset($_POST['submit'])){
    //\Fuel\Core\Session::_init();
    //\Fuel\Core\Session::set('ses_anticipo_prov',$_POST['username']);
    Response::redirect('anticipo/create');
}
else {
    if ($anticipos):

        foreach ($anticipos as $a) {
            //$provs[$p->get('id')] = $p->get('nombre');
            //TODO: suma de anticipos anteriores RECOGIDOS
            //$acum ¿?
        }

    else: ?>
        <!--<p>No se han encontrado anticipos anteriores.</p>-->
    <?php endif;
    $totalKg=2000;
    $precio=0.30;
    $acum= 200;

        echo Form::open('anticipo/create', array("class" => "form-horizontal")); ?>

        <fieldset>
            <div class="form-group">
                <?php echo Form::label('Kilos totales entregados (sólo Manzanilla y Gordal)', 'totalkg', array('class' => 'control-label')); ?>
                <?php echo Form::input('totalkg', $totalKg, array('class' => 'col-md-4 form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label('Precio por kilo', 'precio', array('class' => 'control-label')); ?>
                <?php echo Form::input('precio', $precio, array('class' => 'col-md-4 form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label('Total €', 'totale', array('class' => 'control-label')); ?>
                <?php echo Form::input('totale', $totalKg*$precio, array('class' => 'col-md-4 form-control','readonly'=>'readonly')); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label('Acumulado de anticipos recogidos', 'acum', array('class' => 'control-label')); ?>
                <?php echo Form::input('acum', $acum, array('class' => 'col-md-4 form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo Form::label('Anticipo calculado automáticamente (es la que se registrará)', 'anticipo', array('class' => 'control-label')); ?>
                <?php echo Form::input('anticipo', ($totalKg*$precio)-$acum, array('class' => 'col-md-4 form-control')); ?>
            </div>
            <br/>
            <br/>
            <div class="form-group">
                <label class='control-label'>&nbsp;</label>
                <?php echo Form::submit('submit', 'Registrar anticipo', array('class' => 'btn btn-primary')); ?>
            </div>
        </fieldset>
        <?php echo Form::close();



}?>
