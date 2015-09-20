<?php
if(isset($puesto)){
    echo "<h2>Entrega diaria para el puesto <span class='muted'>$puesto.</span></h2>";
    echo "<h3>Día: <span class='muted'>".date_conv($fecha)."</span></h3><br/>";
}
else{
    echo "<h2><span class='muted'>Entregas</span> realizadas durante la campaña 2015.</h2>";
    echo '<br/>'.Html::anchor('entrega/create', '<span class="glyphicon glyphicon-plus"></span> Añadir nueva entrega', array('class' => 'btn btn-success'));
}
?>
<br/>
<?php if ($entregas): ?>
    <?php if(isset($puesto)){ ?>
        <h4>Número de entregas registradas hoy: <span class='muted'><?php echo count($entregas); ?></span></h4>
    <?php }else{ ?>
        <h4>Número de entregas registradas en total: <span class='muted'><?php echo count($entregas); ?></span></h4>
    <?php } ?>
    <br/>
<table class="table table-striped print">
	<thead>
		<tr>
			<th>Fecha entrega</th>
            <th>Proveedor</th>
            <th>NIF/CIF</th>
			<th>Núm. Albarán</th>
			<th>Variedad</th>
			<th>Total Kg</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach ($entregas as $item):?>
    <tr>
			<td><?php echo date_conv($item->fecha); ?></td>
            <td><?php echo Model_Proveedor::find(Model_Albaran::find('first', array('where' => array('id' => $item->albaran)))->get('idproveedor'))->get('nombre'); ?></td>
            <td><?php echo Model_Proveedor::find(Model_Albaran::find('first', array('where' => array('id' => $item->albaran)))->get('idproveedor'))->get('nifcif'); ?></td>
            <td><?php echo Model_Albaran::find($item->albaran)->get('idalbaran'); ?></td>
			<td><?php echo Model_Variedad::find($item->variedad)->get('nombre');?></td>
			<td><?php echo $item->total; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('entrega/view/'.$item->id, '<span class="glyphicon glyphicon-eye-open"></span> Detalle', array('class' => 'btn btn-default')); ?>
                        <?php /*echo Html::anchor('entrega/edit/'.$item->id, '<i class="icon-wrench"></i> Editar', array('class' => 'btn btn-small'));*/ ?>
                        <?php /*echo Html::anchor('entrega/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Borrar', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('¿Estás seguro de esto?')"));*/ ?>
                    </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No se han registrado aún entregas.</p>
<br/>
<?php endif; ?>
<p>
    <?php echo Html::anchor('javascript:window.print()', '<span class="glyphicon glyphicon-print"></span> Imprimir entrada diaria', array('class' => 'btn btn-small btn-info','id'=>'print-deliverynote')); ?>
    <?php if(isset($puesto)){ ?>
        <?php echo Html::anchor('entrega/fechas/'.$idpuesto, 'Consultar entrada en otra fecha', array('class' => 'btn btn-success')); ?>
    <?php } ?>
</p>
