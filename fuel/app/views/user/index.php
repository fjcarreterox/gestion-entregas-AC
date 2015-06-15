<h2><span class='muted'>Usuarios del sistema</span></h2>
<br>
<?php if ($users):

    foreach ($puestos as $p) {
        $p_array[$p->get('id')] = $p->get('nombre');
    }

    ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre de usuario</th>
            <th>Puesto asociado</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>		<tr>

			<td><?php echo $item->username; ?></td>
            <td><?php echo Model_Puesto::find($item->idpuesto)->get('nombre'); ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('user/view/'.$item->id, '<i class="icon-eye-open"></i> Ver Ficha', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('user/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small')); ?>
                        <?php echo Html::anchor('user/new_pass/'.$item->id, '<i class="icon-trash icon-white"></i> Cambiar contraseña', array('class' => 'btn btn-small btn-warning')); ?>
                        <?php echo Html::anchor('user/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto?')")); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No se han encontrado usuarios.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/create', 'Añadir nuevo usuario', array('class' => 'btn btn-success')); ?>

</p>
