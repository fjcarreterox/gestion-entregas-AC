<h2>Detalle de la <span class='muted'>factura nº<?php echo $factura->id; ?></span> seleccionada:</h2>

<p>
	<strong>Proveedor:</strong>
	<?php echo Model_Proveedor::find($factura->idprov)->get('nombre'); ?></p>
<p>
    <strong>Fecha de emisión:</strong>
    <?php echo date('d-m-Y',$factura->created_at); ?></p>
<p>
	<strong>Concepto:</strong>
	<?php echo $factura->concepto; ?></p>
<p>
	<strong>Base Imponible:</strong>
	<?php echo $factura->base_imponible; ?>&euro;</p>
<p>
	<strong>IVA:</strong>
	<?php echo $factura->iva; ?>%</p>
<p>
	<strong>Retención:</strong>
	<?php echo $factura->retencion; ?>%</p>
<p>
	<strong>Total:</strong>
	<?php echo $factura->total; ?>&euro;</p>

<?php echo Html::anchor('factura/edit/'.$factura->id, 'Editar'); ?> |
<?php echo Html::anchor('factura', 'Volver'); ?>