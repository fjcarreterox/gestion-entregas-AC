<h2>Listado de <span class='muted'>todos los anticipos</span> registrados en el sistema</h2>
<br>
<?php if ($anticipos):
$total = 0;
$total_recogido = 0;
?>
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
<?php foreach ($anticipos as $item): ?>
    <tr>
			<td><?php echo date_conv($item->fecha); ?></td>
			<td><?php echo Model_Proveedor::find($item->idprov)->get('nombre'); ?></td>
			<td><?php echo $item->numcheque; ?></td>
			<td><?php echo Model_Banco::find($item->idbanco)->get('nombre'); ?></td>
			<td><?php $total += $item->cuantia;echo $item->cuantia; ?> &euro;</td>
			<td><?php if($item->recogido) {
                    echo "SÍ";
                    $total_recogido += $item->cuantia;
                }
                else
                    echo "NO"; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('anticipo/view/'.$item->id, '<i class="icon-eye-open"></i> Ver detalle', array('class' => 'btn btn-small btn-default')); ?>
                        <?php echo Html::anchor('anticipo/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small btn-success')); ?>
                        <?php echo Html::anchor('anticipo/print/'.$item->id, '<i class="icon-info icon-white"></i> Imprimir', array('class' => 'btn btn-small btn-info')); ?>
                        <?php echo Html::anchor('anticipo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')")); ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<p>Mostramos una tabla resumen del acumulado:</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Anticipos totales (&euro;)</th>
            <th>Anticipos totales recogidos (&euro;)</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo number_format($total,2); ?> &euro;</td>
        <td><?php echo number_format($total_recogido,2); ?> &euro;</td>
    </tr>
    </tbody>
</table>
    <br/>
    <br/>

<?php else: ?>
<p>No se han encontrado anticipos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('anticipo/index', 'Registrar un nuevo anticipo', array('class' => 'btn btn-success')); ?>

</p>
