<?php
include '../modelo/AdulMayHasCursos.php';
$adulMayHasCursos = new AdulMay();

if ($_POST['funcion'] == 'registrar') {
    $curso = $_POST['curso'];
    $tutor = $_POST['tutor'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    $adulMay = $_POST['adulMay'];
    
    $adulMayhasCursos->crear($curso,$tutor,$estado,$fecha,$adulMay);
}


if ($_POST['funcion'] == 'eliminar') {
    $id_am = $_POST['id_am'];
    $adulMay->eliminar($id_am);
}

