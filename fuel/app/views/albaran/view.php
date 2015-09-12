<h2>Mostrando detalle de <span class='muted'>albarán:</span></h2>
<br/>
<p>
	<strong>Núm Albarán:</strong>
	<?php echo $albaran->idalbaran; ?></p>
<p>
    <strong>Fecha:</strong>
    <?php echo date('d-m-Y',$albaran->created_at); ?></p>
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
<br/>
<?php echo Html::anchor('albaran/edit/'.$albaran->id, 'Editar',array('class' => 'btn btn-sm btn-default')); ?>
<?php echo Html::anchor('albaran/print/'.$albaran->id, 'Imprimir',array('class' => 'btn btn-sm btn-info')); ?>
<?php echo Html::anchor('albaran/list', 'Volver al listado completo',array('class' => 'btn btn-sm btn-danger'));?>
<?php
    $v=Session::get();
    if($v['username']=="Javi" || $v['username']=="Rocio" ){
        echo Html::anchor('albaran/delete/' . $albaran->id, 'Borrar albarán', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto? El borrado de un albarán conllevará el borrado de sus entregas asociadas.')"));
    }
?>