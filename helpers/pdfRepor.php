<?php
require('../vendor/setasign/fpdf/fpdf.php');

if ($_POST['funcion'] == 'reporFG') {

    $name = generar(15);
    $name = '../assets/files/' . $name . '.pdf';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, '¡Hola, Mundo!');

    $return = $pdf->Output($name, 'F');
    //$return = base64_encode($return);
    echo json_encode($name);
}

if ($_POST['funcion'] == 'elimDoc') {
    $doc = $_POST['NAME'];
    unlink($doc);
    echo $doc;
}


function generar($longitud)
{
    $key = '';
    $patron = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $max = strlen($patron) - 1;
    for ($i = 0; $i < $longitud; $i++) {
        $key .= $patron[mt_rand(0, $max)];
    }
    return $key;
}
