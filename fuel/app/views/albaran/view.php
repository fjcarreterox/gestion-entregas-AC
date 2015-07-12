<h2>Mostrando detalle de <span class='muted'>albarán:</span></h2>
<br/>
<p>
	<strong>Núm Albarán:</strong>
	<?php echo $albaran->idalbaran; ?></p>
<p>
    <strong>Fecha:</strong>
    <?php echo date('d-m-Y',$albaran->created_at); ?></p>
<p>
	<strong>Entrega(s):</strong></p>
    <table class="table table-striped">
        <tr>
	<?php
        foreach($entregas as $e) {
            echo "<td>".Html::anchor('entrega/view/'.$e, 'Entrega#'.$e)."</td>";
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

<?php echo Html::anchor('albaran/edit/'.$albaran->id, 'Editar'); ?> |
<?php echo Html::anchor('albaran/list', 'Volver al listado completo');?>

