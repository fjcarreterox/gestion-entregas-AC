<h2><span class='muted'>Variedades</span> de aceituna gestionadas</h2>
<br>
<?php if ($variedads): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>En anticipo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($variedads as $item): ?>		<tr>

			<td><?php echo $item->nombre; ?></td>
			<td><?php echo $item->en_anticipo; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('variedad/view/'.$item->id, '<i class="icon-eye-open"></i> Ver ficha', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('variedad/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('variedad/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No se han encontrado variedades de aceitunas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('variedad/create', 'Añadir nueva Variedad', array('class' => 'btn btn-success')); ?>

</p>
