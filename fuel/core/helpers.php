<?php

//HELPERS
function date_conv($str_date){
    $date=explode('-',$str_date);
    return $date[2]."-".$date[1]."-".$date[0];
}

function get_percents($entrega){
    $str="Con ";
    if($entrega->rate_picado>0){$str.=$entrega->rate_picado."% picado, ";}
    if($entrega->rate_molestado>0){$str.=$entrega->rate_molestado."% molestado, ";}
    if($entrega->rate_morado>0){$str.=$entrega->rate_morado."% morado, ";}
    if($entrega->rate_mosca>0){$str.=$entrega->rate_mosca."% mosca, ";}
    if($entrega->rate_azofairon>0){$str.=$entrega->rate_azofairon."% azofairón, ";}
    if($entrega->rate_agostado>0){$str.=$entrega->rate_agostado."% agostado, ";}
    if($entrega->rate_granizado>0){$str.=$entrega->rate_granizado."% granizado, ";}
    if($entrega->rate_perdigon>0){$str.=$entrega->rate_perdigon."% perdigón, ";}
    if($entrega->rate_taladro>0){$str.=$entrega->rate_taladro."% taladro";}

    if(strcmp($str,"Con ")==0){
        $str="Sin porcentajes asociados";
    }

    $str=rtrim($str,", ");

    return $str.".";
}
