<h2>Listado global de <span class='muted'>facturas</span> emitidas <?php echo $titulo; ?></h2>
<br/>
<?php if ($facturas): ?>
<table class="table table-striped">
	<thead>
		<tr>
            <th>Nº Factura</th>
            <th>Fecha</th>
            <?php if ($titulo=="") {
                echo "<th>Proveedor</th>";
            }?>

			<th>Importe total (&euro;)</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($facturas as $item): ?>		<tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo date_conv($item->fecha); ?></td>
        <?php if ($titulo=="") {
			echo "<td>".Model_Proveedor::find($item->idprov)->get('nombre')."</td>";
            }?>

            <td><?php echo $item->total; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('factura/view/'.$item->id, '<i class="icon-eye-open"></i> Ver Detalle', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('factura/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small btn-success')); ?>
                        <?php echo Html::anchor('factura/print/'.$item->id, '<i class="icon-wrench"></i> Imprimir', array('class' => 'btn btn-small btn-info')); ?>
                        <?php echo Html::anchor('factura/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Eliminar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de querer borrar esta factura?')")); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No se han encontrado facturas hasta ahora.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('factura/create', 'Emitir nueva factura', array('class' => 'btn btn-success')); ?>

</p>
