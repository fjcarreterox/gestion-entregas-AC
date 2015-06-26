<h2>Detalle de la <span class='muted'>factura #<?php echo $factura->id; ?></span> seleccionada:</h2>

<p>
	<strong>Proveedor:</strong>
	<?php echo $factura->idprov; ?></p>
<p>
	<strong>Concepto:</strong>
	<?php echo $factura->concepto; ?></p>
<p>
	<strong>Base Imponible:</strong>
	<?php echo $factura->base_imponible; ?></p>
<p>
	<strong>IVA:</strong>
	<?php echo $factura->iva; ?></p>
<p>
	<strong>Retención:</strong>
	<?php echo $factura->retencion; ?></p>
<p>
	<strong>Total:</strong>
	<?php echo $factura->total; ?></p>

<?php echo Html::anchor('factura/edit/'.$factura->id, 'Editar'); ?> |
<?php echo Html::anchor('factura', 'Volver'); ?>