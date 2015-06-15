<h2>Listing <span class='muted'>Anticipos</span></h2>
<br>
<?php if ($anticipos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Idprov</th>
			<th>Numcheque</th>
			<th>Idbanco</th>
			<th>Cuantia</th>
			<th>Recogido</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($anticipos as $item): ?>		<tr>

			<td><?php echo $item->fecha; ?></td>
			<td><?php echo $item->idprov; ?></td>
			<td><?php echo $item->numcheque; ?></td>
			<td><?php echo $item->idbanco; ?></td>
			<td><?php echo $item->cuantia; ?></td>
			<td><?php echo $item->recogido; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('anticipo/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('anticipo/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('anticipo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Anticipos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('anticipo/create', 'Add new Anticipo', array('class' => 'btn btn-success')); ?>

</p>
