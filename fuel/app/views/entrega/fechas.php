<?php
    echo Form::open(array("class" => "form-horizontal"));
    echo "<h2 > Selecciona un rango de fechas para obtener el listado de entregas de <b>".Model_Puesto::find($idpuesto)->get('nombre')."</b></h2 >";
?>
<p>Para obtener resultados de entregas, asegurate de que la fecha final es posterior a la inicial.</p>
    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Fecha inicial', 'start', array('class'=>'control-label')); ?>
            <?php echo Form::input('start', '', array('type'=>'date','class' => 'col-md-4 form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo Form::label('Fecha final', 'end', array('class'=>'control-label')); ?>
            <?php echo Form::input('end', '', array('type'=>'date','class' => 'col-md-4 form-control')); ?>
        </div>
        <br/>
        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit', 'Consultar entrada diaria', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
    <?php echo Form::close();
    if(count($entregas)>0):
        echo "<p>Mostrando listado de entregas realizadas entre el <b>".date_conv($_POST["start"])."</b> y el <b>".date_conv($_POST["end"])."</b>.</p>";
        echo "<p>Total de entregas encontradas: <b>".count($entregas)."</b></p>";
    ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Proveedor</th>
        <th>NIF/CIF</th>
        <th>Núm. Albarán</th>
        <th>Variedad</th>
        <th>Total Kg</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($entregas as $item):?>
    <tr>
        <td><?php echo date_conv($item->fecha); ?></td>
        <td><?php echo Model_Proveedor::find(Model_Albaran::find('first', array('where' => array('id' => $item->albaran)))->get('idproveedor'))->get('nombre'); ?></td>
        <td><?php echo Model_Proveedor::find(Model_Albaran::find('first', array('where' => array('id' => $item->albaran)))->get('idproveedor'))->get('nifcif'); ?></td>
        <td><?php echo Model_Albaran::find($item->albaran)->get('idalbaran'); ?></td>
        <td><?php echo Model_Variedad::find($item->variedad)->get('nombre');?></td>
        <td><?php echo $item->total; ?></td>
        <td>
            <div class="btn-toolbar">
                <div class="btn-group">
                    <?php echo Html::anchor('entrega/view/'.$item->id, '<i class="icon-eye-open"></i> Ver detalle', array('class' => 'btn btn-small')); ?>
                    <?php /*echo Html::anchor('entrega/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small'));*/ ?>
                    <?php /*echo Html::anchor('entrega/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto?')"));*/ ?>
                </div>
            </div>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
        <?php else: ?>
            <?php if(isset($_POST["submit"])):?>
        <p>No se han encontrado entregas en el intervalo de tiempo especificado. Prueba con otras fechas.</p>
            <?php endif; ?>
    <?php endif; ?>
