<h2>Mostrando detalle de <span class='muted'>albarán:</span></h2>

<p>
	<strong>Núm Albarán:</strong>
	<?php echo $albaran->idalbaran; ?></p>
<p>
    <strong>Fecha:</strong>
    <?php echo date('d-m-Y',$albaran->created_at); ?></p>
<p>
	<strong>Entrega(s):</strong>
	<?php echo Html::anchor('entrega/view/'.$albaran->identrega, 'Entrega#'.$albaran->identrega); ?></p>
<p>
	<strong>Proveedor:</strong>
	<?php echo Model_Proveedor::find($albaran->idproveedor)->get('nombre'); ?></p>
<p>
    <strong>Comentario:</strong>
    <?php echo $albaran->comentario; ?></p>

<?php echo Html::anchor('albaran/edit/'.$albaran->id, 'Editar'); ?> |
<?php echo Html::anchor('albaran/list', 'Volver al listado completo'); ?>