<?php
$pname = html_entity_decode($pname);
$pdf = new PDF_MC_Table();
$pdf->AddFont('Arial','','arial.php');
$title = 'FICHA FINAL DEL PROVEEDOR';
$pdf->SetTitle($title);
$pdf->SetAuthor('Aceitunas Coria S.L.');
$pdf->SetMargins(20,15,20);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',28);
$pdf->MultiCell(0,10,strtoupper('ficha final del proveedor'),0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',24);
$pdf->MultiCell(0,10,utf8_decode(mb_strtoupper($pname)),0,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','BU',14);
$pdf->MultiCell(0,10,utf8_decode('Historial de entregas del cliente'),0,'L');
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,10,utf8_decode('Número total de entregas realizadas: '.count($entregas).' durante toda la campaña.'),0,'L');
$pdf->Ln(3);

$pdf->SetFont('Arial','B',12);
$pdf->SetWidths(array(40,25,30,25,25,32));
$pdf->SetAligns(array('C','C','C','C','C','C'));
//$pdf->SetLeftMargin(15);
$pdf->SetDrawColor(255, 255, 255);
//$pdf->Row(array("","",""));
$pdf->SetDrawColor(0, 0, 0);
$pdf->Row(array("Fecha entrega","Nº Albarán","Variedad","Tamaño","Total Kg","Porcentajes"));
$pdf->SetFont('Arial','',12);

$total_variedades = array();
foreach($entregas as $e){
    $num_alb = Model_Albaran::find($e->albaran)->get('idalbaran');
    $var = Model_Variedad::find($e->variedad)->get('nombre');
    $pdf->Row(array(date_conv($e->fecha),$num_alb,$var,$e->tam,$e->total,get_percents($e)));
    if(isset($total_variedades[$e->variedad])) {
        $total_variedades[$e->variedad] += $e->total;
    }else{
        $total_variedades[$e->variedad] = $e->total;
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial','BU',14);
$pdf->MultiCell(0,10,utf8_decode('Resumen de kg. entregados por variedad de aceituna'),0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetWidths(array(60,60));
$pdf->SetAligns(array('C','C'));
//$pdf->SetLeftMargin(15);
$pdf->SetDrawColor(255, 255, 255);
$pdf->Row(array("",""));
$pdf->SetDrawColor(0, 0, 0);
$pdf->Row(array("Variedad","Total Kg"));
$pdf->SetFont('Arial','',12);

$sumakg = 0;
foreach ($total_variedades as $v => $value){
    $name_var = Model_Variedad::find($v)->get('nombre');
    $pdf->Row(array($name_var,$value." Kg."));
    $sumakg += $value;
}


$pdf->Ln(10);
$pdf->SetFont('Arial','BU',14);
$pdf->MultiCell(0,10,utf8_decode('Listado de anticipos entregados'),0,'L');
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,10,utf8_decode('Número total de anticipos recogidos: '.count($anticipos).' durante toda la campaña.'),0,'L');

if(count($anticipos)>0) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetWidths(array(40, 40, 50, 40));
    $pdf->SetAligns(array('C', 'C', 'C', 'C'));
//$pdf->SetLeftMargin(15);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Row(array("Fecha", "NºCheque", "Banco", "Cuantía"));
    $pdf->SetFont('Arial', '', 12);
    $suma = 0;
    foreach ($anticipos as $a) {
        $bank_name = Model_Banco::find($a->idbanco)->get('nombre');
        $pdf->Row(array(date_conv($a->fecha), $a->numcheque, $bank_name, $a->cuantia . " EUROS"));
        $suma += $a->cuantia;
    }
}
$pdf->Output("Ficha-final-$pname.pdf",'I');