<?php
require('../vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo PUAM
        $this->Image('../assets/img/logo.png', 6, 4, 22);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Salto de línea
        $this->Ln(20);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Reporte Estudiantes (Facilitadores)', 0, 0,'C');
        // Logo Uce
        $this->Image('../assets/img/uce.png', 180, 4, 22);
        // Salto de línea
        $this->Ln(20);
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

    // Tabla
    function ImprovedTableP($header, $data)
{
    // Anchuras de las columnas
    $w = array(18, 55, 45, 18, 10, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row->{'id_usuario'},'LR');
        $this->Cell($w[1],6,utf8_decode($row->{'nombre_usuario'}));
        $this->Cell($w[2],6,$row->{'correoins_usuario'},'LR');
        $this->Cell($w[3],6,$row->{'tel_usuario'},'LR');
        $this->Cell($w[4],6,$row->{'horasrealizadas_usuario'},'LR');
        $this->Cell($w[5],6,utf8_decode($row->{'nombre_crs'}), 'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

function ImprovedTableC($header, $data)
{
    // Anchuras de las columnas
    $w = array(18, 55, 18, 60, 15, 15);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row->{'fecha_clase'},'LR');
        $this->Cell($w[1],6,utf8_decode($row->{'nombre_admay'}));
        $this->Cell($w[2],6,$row->{'id_admay'},'LR');
        if(strlen(utf8_decode($row->{'tema_clase'})) > 40){
            $this->Cell($w[3],6,substr(utf8_decode($row->{'tema_clase'}),0,39));
        }
        else{
            $this->Cell($w[3],6,utf8_decode($row->{'tema_clase'}));
        }
        
        $this->Cell($w[4],6,$row->{'descripcion_tipoclase'},'LR');
        $this->Cell($w[5],6,$row->{'duracion_clase'}, 'LR');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
}

if ($_POST['funcion'] == 'reporFG') {

    $datos = json_decode($_POST['datos']);
    
    $name = generar(15);
    $name = $name . '.pdf';

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8, true);
    // foreach ($datos as $dato) {
    //     $pdf->Cell(40, 10,);
    //     $pdf->Cell(60, 10, $dato->{'id_usuario'}, 0, 1, 'C');
    // }
    $header = array('N. Cedula', 'Nombre', 'Correo', 'Telefono', 'Horas', 'Curso'); 
    $pdf->ImprovedTableP($header, $datos->{'data'});
    $return = $pdf->Output($name, 'F');
    $return = base64_encode($return);
    echo json_encode('../helpers/' . $name);
}

if ($_POST['funcion'] == 'reporC') {

    $datos = json_decode($_POST['datos']);
    $name = generar(15);
    $name = $name . '.pdf';

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8, true);

    $header = array('Fecha', 'Participante', utf8_decode('Cédula P'), 'Tema', 'Clase', utf8_decode('Duración')); 
    $pdf->ImprovedTableC($header, $datos->{'data'});
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
