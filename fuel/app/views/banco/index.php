<h2>Listado de <span class='muted'>bancos</span> del sistema:</h2>
<br>
<?php if ($bancos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bancos as $item): ?>		<tr>

			<td><?php echo $item->nombre; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('banco/view/'.$item->id, '<i class="icon-eye-open"></i> Ver Ficha', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('banco/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('banco/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto?')")); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bancos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('banco/create', 'Alta de nuevo banco', array('class' => 'btn btn-success')); ?>

</p>
