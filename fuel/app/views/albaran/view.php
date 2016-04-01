<h2>Mostrando detalle de <span class='muted'>albarán:</span></h2>
<br/>
<p>
	<strong>Núm Albarán:</strong>
	<?php echo $albaran->idalbaran; ?></p>
<p>
    <strong>Fecha:</strong>
    <?php echo date_conv($albaran->fecha); ?></p>
<p>
	<strong>Detalle de entrega(s)</strong></p>
    <table class="table table-striped">
        <tr>
	<?php
        foreach($entregas as $e) {
            echo "<td>".Html::anchor('entrega/view/'.$e, 'Entrega #'.$e)."</td>";
        }
    ?>
        </tr>
</table>
<p>
	<strong>Proveedor:</strong>
	<?php echo Model_Proveedor::find($albaran->idproveedor)->get('nombre'); ?></p>
<p>
    <strong>Comentario:</strong>
    <?php echo $albaran->comentario; ?></p>
<br/><br/>
<?php echo Html::anchor('albaran/edit/'.$albaran->id, '<span class="glyphicon glyphicon-pencil"></span> Editar',array('class' => 'btn btn-success')); ?>
<?php echo Html::anchor('albaran/print/'.$albaran->id, '<span class="glyphicon glyphicon-print"></span> Imprimir',array('class' => 'btn btn-sm btn-info')); ?>
<?php echo Html::anchor('albaran/list', '<span class="glyphicon glyphicon-backward"></span> Volver al listado',array('class' => 'btn btn-sm btn-danger'));?>
<?php
    $v=Session::get();
    if($v['username']=="javi" || $v['username']=="Rocio" ){
        echo Html::anchor('albaran/delete/' . $albaran->id, '<span class="glyphicon glyphicon-trash"></span> Borrar este albarán', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto? El borrado de un albarán conllevará el borrado de sus entregas asociadas.')"));
    }
?>