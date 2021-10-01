<?php
require('../vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo PUAM
        $this->Image('../assets/img/logo.png', 6, 4, 22);
        // Arial bold 12
        $this->SetFont('Arial', 'B', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'DIRECCION DE VINCULACION CON LA SOCIEDAD', 0, 0,'C');
        $this->Ln(4);
        // Movernos a la derecha
        $this->Cell(80);
        $this->Cell(30, 10, 'UNIVERSIDAD CENTRAL DEL ECUADOR', 0, 0,'C');
        // Logo Uce
        $this->Image('../assets/img/uce.png', 180, 4, 22);
        // Salto de línea
        $this->Ln(60);
        }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

if ($_POST['funcion'] == 'certificado') {
    $name = generar(15);
    $name = $name . '.pdf';
    $estudiante = $_POST['NOMBRE'];
    $cedula = $_POST['ID'];
    $horas = $_POST['HORASR'];

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetMargins(25, 25 , 25);
    $pdf->SetFont('Arial', 'B', 8, true);

    // Movernos a la derecha
    $pdf->Cell(80);
    // Arial bold 12
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(30, 10, 'CERTIFICADO DE PRACTICAS DE VINCULACION', 0, 0,'C');
    // Salto de línea
    $pdf->Ln(20);
    $pdf->SetFont('Arial','', 12);
    $pdf->MultiCell(0, 7, utf8_decode("Mediante la presente certifico, que la estudiante $estudiante con cédula de identidad $cedula, perteneciente a la Carrera de Ingeniería informática de la Facultad de Ingeniería y Ciencias Aplicadas, ha concluido satisfactoriamente sus prácticas de vinculación, realizadas en el Programa Universitario del Adulto Mayor, donde cumplió  las $horas horas  de vinculación semestre mayo 2021 - septiembre 2021. las cuales fueron ejecutadas en las planificaciones y evaluaciones del proyecto presentado en la Dirección de Vinculación con la Sociedad."));
 // Salto de línea
    $pdf->Ln(14);
    setlocale(LC_TIME,"es_ES");
    $fecha = "Quito, ".strftime("%d de %B del %Y");
    $pdf->Cell(0, 10, $fecha , 0, 0,'R');
    $pdf->Ln(14);
    $pdf->Cell(0, 10, 'Atentamente,', 0, 0,'C');
    $pdf->Ln(40);
    $pdf->Cell(30, 10, utf8_decode('Mtr. Pedro Iván Moreno'), 0, 0, 'L');
    $pdf->Cell(0, 10, "Mtr. Berioska Meneses", 0, 0, 'R');
    $pdf->Ln(7);
    $pdf->Cell(30, 10, "DIRECTOR DE VINCULACION");
    $pdf->Cell(0, 10, utf8_decode("CORDINADORA ACADÉMICA"), 0, 0, 'R');
    $pdf->Ln(7);
    $pdf->Cell(30, 10, "CON LA SOCIEDAD - UCE");
    $pdf->Cell(0, 10, "DEL PUAM", 0, 0, 'R');
    

    $return = $pdf->Output($name, 'F');
    $return = base64_encode($return);
    echo json_encode('../helpers/' . $name);
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
