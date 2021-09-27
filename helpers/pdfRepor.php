<?php
require('../vendor/setasign/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');

$return = $pdf->Output('Reporte Alumnos.pdf', 'S');
//$return = base64_encode($return);
$return = 'data:application/pdf;base64,'.base64_encode($return);
echo json_encode($return);

?>