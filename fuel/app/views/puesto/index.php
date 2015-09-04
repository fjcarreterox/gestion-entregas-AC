<h2>Listado de <span class='muted'>puestos</span> activos.</h2>
<br>
<p>Selecciona la acción concreta que quieres realizar sobre uno de los puestos de recogida de la empresa:</p>
<?php if ($puestos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre identificativo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($puestos as $item): ?>		<tr>

			<td><?php echo $item->nombre; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('puesto/view/'.$item->id, '<i class="icon-eye-open"></i> Ver Ficha', array('class' => 'btn btn-sm btn-default')); ?>
                        <?php echo Html::anchor('puesto/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-sm btn-success')); ?>
                        <?php echo Html::anchor('entrega/list/'.$item->id, '<i class="icon-eye-open"></i> Entrada diaria', array('class' => 'btn btn-sm btn-info')); ?>
                    </div>
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
