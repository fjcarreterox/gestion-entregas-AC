<h2><span class='muted'>Entregas</span> realizadas durante la campaña 2015</h2>
<br>
<p><?php echo Html::anchor('entrega/index', 'Añadir nueva entrega', array('class' => 'btn btn-success')); ?></p>
<?php if ($entregas): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Albaran</th>
			<th>Variedad</th>
			<th>Tamaño</th>
			<th>Total Kg</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entregas as $item): ?>		<tr>

			<td><?php echo $item->fecha; ?></td>
			<td><?php echo $item->albaran; ?></td>
			<td><?php
                $nombre_variedad=Model_Variedad::find($item->variedad)->get('nombre');
                echo $nombre_variedad;

                ?></td>
			<td><?php echo $item->tam; ?></td>
			<td><?php echo $item->total; ?></td>

			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('entrega/view/'.$item->id, '<i class="icon-eye-open"></i> Ver detalle', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('entrega/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('entrega/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No se han registrado aún entregas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('entrega/index', 'Añadir nueva entrega', array('class' => 'btn btn-success')); ?>

</p>
