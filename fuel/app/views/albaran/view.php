<h2>Mostrando detalle de <span class='muted'>albarán:</span></h2>

<p>
	<strong>Núm Albarán:</strong>
	<?php echo str_pad($albaran->idalbaran,5,'0',STR_PAD_LEFT); ?></p>
<p>
    <strong>Fecha:</strong>
    <?php echo date('d-m-Y',$albaran->created_at); ?></p>
<p>
	<strong>Entrega(s):</strong>
	<?php echo Html::anchor('entrega/view/'.$albaran->identrega, 'Entrega#'.$albaran->identrega); ?></p>
<p>
	<strong>Proveedor:</strong>
	<?php echo Model_Proveedor::find($albaran->idproveedor)->get('nombre'); ?></p>

<?php echo Html::anchor('albaran/edit/'.$albaran->id, 'Editar'); ?> |
<?php echo Html::anchor('albaran', 'Volver'); ?>