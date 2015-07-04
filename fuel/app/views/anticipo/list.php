<h2>Listado de <span class='muted'>anticipos</span> registrados en el sistema</h2>
<br>
<?php if ($anticipos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Proveedor</th>
			<th>Núm. Cheque</th>
			<th>Banco</th>
			<th>Cuantía</th>
			<th>Recogido</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($anticipos as $item): ?>		<tr>

			<td><?php echo date_conv($item->fecha); ?></td>
			<td><?php echo Model_Proveedor::find($item->idprov)->get('nombre'); ?></td>
			<td><?php echo $item->numcheque; ?></td>
			<td><?php echo Model_Banco::find($item->idbanco)->get('nombre'); ?></td>
			<td><?php echo $item->cuantia; ?></td>
			<td><?php if($item->recogido)
                    echo "SÍ";
                else
                    echo "NO"; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('anticipo/view/'.$item->id, '<i class="icon-eye-open"></i> Ver detalle', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('anticipo/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php /*echo Html::anchor('anticipo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')"));*/ ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Anticipos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('anticipo/index', 'Registrar un nuevo anticipo', array('class' => 'btn btn-success')); ?>

</p>
