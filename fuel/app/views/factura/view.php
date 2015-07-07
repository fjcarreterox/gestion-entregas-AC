<h2>Resumen de la <span class='muted'>factura nº<?php echo $factura->id; ?></span> seleccionada:</h2>
<br/>
<p>
	<strong>Proveedor:</strong>
	<?php echo Model_Proveedor::find($factura->idprov)->get('nombre'); ?></p>
<p>
    <strong>Fecha de emisión:</strong>
    <?php echo date_conv($factura->fecha); ?></p>
<p>
	<strong>Total:</strong>
	<?php echo $factura->total; ?>&euro;</p>
<p>
    <strong>Comentario:</strong>
    <?php echo $factura->comentario; ?></p>

<?php echo Html::anchor('factura/lineas/'.$factura->id, 'Ver sus líneas facturadas'); ?> |
<?php echo Html::anchor('factura/edit/'.$factura->id, 'Editar'); ?> |
<?php echo Html::anchor('factura/list', 'Volver'); ?>