<h2><span class='muted'>Puestos</span> activos:</h2>
<br>
<?php if ($puestos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($puestos as $item): ?>		<tr>

			<td><?php echo $item->nombre; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('puesto/view/'.$item->id, '<i class="icon-eye-open"></i> Ver Ficha', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('puesto/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('puesto/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Puestos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('puesto/create', 'Añadir un nuevo puesto', array('class' => 'btn btn-success')); ?>

</p>
