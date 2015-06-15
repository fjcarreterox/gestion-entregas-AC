<h2>Datos del proveedor <span class='muted'>seleccionado:<?php /*echo $proveedor->id;*/ ?></span></h2>

<p>
	<strong>Nombre:</strong>
	<?php echo $proveedor->nombre; ?></p>
<p>
	<strong>Domicilio:</strong>
	<?php echo $proveedor->domicilio; ?></p>
<p>
	<strong>Población:</strong>
	<?php echo $proveedor->poblacion; ?></p>
<p>
	<strong>NIF/CIF:</strong>
	<?php echo $proveedor->nifcif; ?></p>
<p>
	<strong>Teléfono:</strong>
	<?php echo $proveedor->telefono; ?></p>
<p>
	<strong>Tipo de proveedor:</strong>
	<?php echo $proveedor->tipo; ?></p>
<p>
    <strong>Comentario:</strong>
    <?php echo $proveedor->comentario; ?></p>
<p>
    <strong>Envases prestados:</strong>
    <?php echo $proveedor->envases; ?></p>
<?php echo Html::anchor('proveedor/edit/'.$proveedor->id, 'Editar'); ?> |
<?php echo Html::anchor('proveedor', 'Volver'); ?>