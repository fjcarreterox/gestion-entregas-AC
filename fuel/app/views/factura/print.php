<?php
$prov = Model_Proveedor::find(\Fuel\Core\Session::get('idprov'));
?>
<div id="page-wrap">
    <textarea id="header">FACTURA</textarea>
    <div id="identity">
        <div id="address">
            <p>ACEITUNAS CORIA, S.L.</p>
            <p class="smaller">N.I.F. B-91030692</p>
            <p class="smallest">Avda. Andalucía, 189 - Teléfono 954 77 19 29<br/>
                41100 CORIA DEL RIO (Sevilla)</p>
        </div>
        <div class="customer">
        <p>DATOS DEL PROVEEDOR</p>
            <textarea id="customer-title">
<?php echo $prov->get('nombre')."\r\n";?>
<?php echo $prov->get('domicilio')."\r\n";?>
<?php echo $prov->get('poblacion')."\r\n";?>
<?php echo $prov->get('nifcif')."\r\n";?>
</textarea>
        </div>
    </div>

    <div style="clear:both"></div>
    <div id="customer">
        <table id="meta">
            <tr>
                <td class="meta-head">Factura Núm.</td>
                <td><?php echo \Fuel\Core\Session::get('idfactura');?></td>
            </tr>
            <tr>

                <td class="meta-head">Fecha</td>
                <td><?php echo date_conv(\Fuel\Core\Session::get('fecha'));?></td>
            </tr>
            <tr>
                <td class="meta-head">Total factura</td>
                <td><div class="total_fac">0</div></td>
            </tr>
        </table>
    </div>

    <table id="items">
        <tr>
            <th>Concepto</th>
            <th>Precio</th>
            <th>Kg.</th>
            <th>Importe</th>
        </tr>

        <tr class="item-row">
            <td class="item-concept"><div class="delete-wpr"><textarea>_Concepto_</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
            <td><textarea class="coste">0.00 &euro;</textarea></td>
            <td><textarea class="kg">1</textarea></td>
            <td><span class="precio">0.00 &euro;</span></td>
        </tr>

        <tr id="hiderow">
            <td colspan="5"><a id="addrow_bill" href="javascript:;" title="Nueva línea de factura"><img src="../assets/img/plus.png" alt="Nueva línea de factura"/></a></td>
        </tr>

        <tr>
            <td colspan="1" class="blank"> </td>
            <td colspan="2" class="total-line">Importe total</td>
            <td class="total-value"><div id="subtotal">0.00 &euro;</div></td>
        </tr>
        <tr>

            <td colspan="1" class="blank"> </td>
            <td colspan="2" class="total-line">IVA</td>
            <td class="total-value"><textarea id="iva">12</textarea> %</td>
        </tr>
        <tr>
            <td colspan="1" class="blank"> </td>
            <td colspan="2" class="total-line">Suma</td>
            <td class="total-value"><div id="parcial">0.00 &euro;</div></td>
        </tr>
        <tr>
            <td colspan="1" class="blank"> </td>
            <td colspan="2" class="total-line">Retención</td>
            <td class="total-value"><textarea id="retencion">2</textarea> %</td>
        </tr>
        <tr>
            <td colspan="1" class="blank"> </td>
            <td colspan="2" class="total-line balance">TOTAL EUROS</td>
            <td class="total-value balance"><div class="total_fac">0.00 &euro;</div></td>
        </tr>
    </table>
    <div class="comment">
        <p>Comentario:</p><textarea><?php echo \Fuel\Core\Session::get('comment'); ?></textarea>
    </div>
    <div id="terms">
        <h5>Firma:</h5><br/><br/>
    </div>

    <?php echo Form::open(array("class"=>"form-horizontal")); ?>
    <?php echo Form::input('total_factura',0 , array('class' => 'col-md-4 form-control', 'type'=>'hidden' )); ?>
    <?php echo Form::input('comentario','', array('class' => 'col-md-4 form-control', 'type'=>'hidden' )); ?>
            <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            <?php echo Form::submit('submit_lines', 'Guardar factura', array('class' => 'btn btn-primary')); ?>
        </div>
    <?php echo Form::close(); ?>
</div>