/**
 * Created by rigel on 11/06/15.
 */
$( document ).ready(function() {
    $("#form_totalkg").keyup(function( event ) {
        $('#form_totale').attr('value',parseInt($('#form_totalkg')[0].value) * parseFloat($('#form_precio')[0].value));
        $('#form_anticipo').attr('value',parseFloat($('#form_totale')[0].value)-parseFloat($('#form_acum')[0].value));
    });
    $("#form_precio").keyup(function( event ) {
        $('#form_totale').attr('value',parseInt($('#form_totalkg')[0].value) * parseFloat($('#form_precio')[0].value));
        $('#form_anticipo').attr('value',parseFloat($('#form_totale')[0].value)-parseFloat($('#form_acum')[0].value));
    });
});

