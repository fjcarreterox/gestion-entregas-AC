<div id="page-wrap">
    <textarea id="header">FACTURA</textarea>
    <div id="identity">
        <div id="address">
            <p>ACEITUNAS CORIA, S.L.</p>
            <p class="smaller">N.I.F. B-91030692</p><br/>
            <p class="smallest">Avda. Andalucía, 189 - Teléfono 954 77 19 29<br/>
                41100 CORIA DEL RIO (Sevilla)</p>
        </div>
            <textarea id="customer-title">DATOS DEL PROVEEDOR

Panduro Cuscurro S.L.
c/ Virgen de regla roja, 18
CORIA
B-91234567</textarea>
    </div>

    <div style="clear:both"></div>
    <div id="customer">
        <table id="meta">
            <tr>
                <td class="meta-head">Factura Núm.</td>
                <td><textarea>XXXX</textarea></td>
            </tr>
            <tr>

                <td class="meta-head">Fecha</td>
                <td><textarea id="date"></textarea></td>
            </tr>
            <tr>
                <td class="meta-head">Total factura</td>
                <td><div class="due">XXXX</div></td>
            </tr>
        </table>
    </div>

    <table id="items">
        <tr>
            <th>Concepto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Importe</th>
        </tr>

        <tr class="item-row">
            <td class="item-name"><div class="delete-wpr"><textarea>__Concepto__</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
            <td class="description"><textarea>__Descripción__</textarea></td>
            <td><textarea class="cost">0.00&euro;</textarea></td>
            <td><textarea class="qty">1</textarea></td>
            <td><span class="price">0.00&euro;</span></td>
        </tr>

        <tr id="hiderow">
            <td colspan="5"><a id="addrow" href="javascript:;" title="Nueva línea de factura"><img src="../assets/img/plus.png" alt="Nueva línea de factura"/></a></td>
        </tr>

        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Importe</td>
            <td class="total-value"><div id="subtotal">XX.XX &euro;</div></td>
        </tr>
        <tr>

            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Compensación</td>
            <td class="total-value"><div id="total">XX.XX &euro;</div></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Suma</td>
            <td class="total-value"><textarea id="paid">XX.XX &euro;</textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line balance">TOTAL EUROS</td>
            <td class="total-value balance"><div class="due">XX.XX &euro;</div></td>
        </tr>
    </table>

    <div id="terms">
        <h5>Firma</h5>
        <textarea>.....COMMENT?.......</textarea>
    </div>
</div>