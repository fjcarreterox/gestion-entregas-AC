<h2>Listado de <span class='muted'>albaranes</span> de entregas <?php echo $titulo;?></h2>
<br>
<?php if ($albarans): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Albarán núm.</th>
            <th>Fecha</th>
			<th>Proveedor</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($albarans as $item): ?>
        <tr>
			<td><?php echo $item->idalbaran; ?></td>
            <td><?php echo date('d-m-Y',$item->created_at);?></td>
			<td><?php echo Model_Proveedor::find($item->idproveedor)['nombre']; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('albaran/view/'.$item->id, '<span class="glyphicon glyphicon-eye-open"></span> Detalle Albarán', array('class' => 'btn btn-default')); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<?php else: ?>
<p>No se han encontrado albaranes para mostrar.</p>
<?php endif; ?>