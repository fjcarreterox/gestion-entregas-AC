<h2>Resumen de <span class='muted'>IVAs y retenciones</span> de las facturas emitidas por proveedor</h2>
<br/>
<?php if ($facturas): ?>
    <p>Se encuentran ordenadas descendientemente por nombre de proveedor.</p>
    <br/>
    <table class="table table-striped print">
        <thead>
        <tr>
            <th>Proveedor</th>
            <th>Base imponible</th>
            <th>IVA</th>
            <th>Compensación</th>
            <th>Suma</th>
            <th>Retención</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($facturas as $p => $f): ?>
            <tr>
                <td><?php echo Model_Proveedor::find($p)->get('nombre'); ?></td>
                <td><?php echo $f["base"]; ?> &euro;</td>
                <td><?php echo $f["iva"]; ?>%</td>
                <td><?php echo $f["comp"]; ?> &euro;</td>
                <td><?php echo $f["suma"]; ?> &euro;</td>
                <td><?php echo $f["retencion"]; ?> &euro;</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo Html::anchor('javascript:window.print()', '<span class="glyphicon glyphicon-print"></span> Imprimir resumen', array('class' => 'btn btn-info')); ?>
<?php else: ?>
    <p>No se han encontrado facturas hasta ahora.</p>
<?php endif; ?>

