function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  date + " de " + months[now.getMonth()] + " de " + (fourdigits(now.getYear()));
  return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function update_parcial() {
    var subtotal = 0;
    $('.precio').each(function(i){
        precio = $(this).html().replace(" €","");
        //precio = $(this).html();
        if (!isNaN(precio)) subtotal += Number(precio);
    });

    subtotal = roundNumber(subtotal,2);
    $('#subtotal').html(subtotal+" &euro;");

    iva = $.trim($("#iva").val());
    total_iva = roundNumber(((subtotal * Number(iva)) / 100 ),2);
    parcial = Number(subtotal) + Number(total_iva);
    parcial = roundNumber(parcial,2);

    $('#parcial').html(parcial+" &euro;");
    $('.total-iva').html(total_iva+" &euro;");
    //$('.total_fac').html(total+" &euro;");
    update_total_fac();
}

function update_total_fac() {
    var parcial = $("#parcial").html().replace(" €","");
    var total_fac = $(".total_fac").html().replace(" €","");
    var retencion = $("#retencion").val();
    var total_retencion = roundNumber((Number(parcial) * retencion) / 100,2);
    total_fac= Number(parcial) - total_retencion;
    total_fac = roundNumber(total_fac,2);

    $('.total_fac').html(total_fac+" &euro;");
    $('.total-retencion').html(total_retencion+" &euro;");
    $("input[name='total_factura']").val(total_fac);
}

function update_precio() {
    var row = $(this).parents('.item-row');
    var precio = row.find('.coste').val().replace("€","") * row.find('.kg').val();
    precio = roundNumber(precio,2);
    isNaN(precio) ? row.find('.precio').html("N/D") : row.find('.precio').html(precio + " &euro;");
    update_parcial();
}

function bind_bill() {
  $(".coste").blur(update_precio);
  $(".kg").blur(update_precio);
}

function update_row(){
    $.ajax({
        data:  parametros,
        url:   'ejemplo_ajax_proceso.php',
        type:  'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
            $("#resultado").html(response);
        }
    });
}

$(document).ready(function() {

    $('input').click(function(){
        $(this).select();
    });

    $('body').on('click',"input[name='submit_lines']", function(){
        var comment = $(".comment textarea").val();
        $("input[name='comentario']").val(comment);
    });

    $("#addrow_bill").click(function(){
        $(".item-row:last").after('<tr class="item-row"><td class="item-concept"><div class="delete-wpr"><textarea>___Concepto___</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td><textarea class="coste">0.00 &euro;</textarea></td><td><textarea class="kg">1</textarea></td><td><span class="precio">0.00 &euro;</span></td></tr>');
        if ($(".delete").length > 0) $(".delete").show();
        bind_bill();
    });

    bind_bill();

    $('body').on('click',".delete",function(){
        $(this).parents('.item-row').remove();
        update_parcial();
        if ($(".delete").length < 2) $(".delete").hide();
    });

    $('body').on('blur',"#iva",function(){
        update_parcial();
    });

    $('body').on('blur',"#retencion",function(){
        update_total_fac();
    });

    $("#date").val(print_today());
    update_parcial();
});