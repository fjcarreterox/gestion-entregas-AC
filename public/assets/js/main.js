/**
 * Created by motillaPalace on 13/07/2015.
 */
$( document ).ready(function() {
    $("#form_end").click(function( event ) {
        if($("#form_idprov")[0].value=="0") {
            alert("Por favor, selecciona al proveedor que realiza la entrega.");
            return false;
        }
        return true;
    });

    $("#form_anticipo_submit").click(function( event ) {
        if($("#form_provider")[0].value=="0") {
            alert("Por favor, selecciona el proveedor al que quieres calcular el anticipo.");
            return false;
        }
        return true;
    });
});