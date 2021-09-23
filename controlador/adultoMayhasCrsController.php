<?php
include '../modelo/AdulMayHasCursos.php';
$adulMayHasCursos = new adulMayHasCursos();

if ($_POST['funcion'] == 'registrar') {
    $curso = $_POST['curso'];
    $tutor = $_POST['tutor'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    $adulMay = $_POST['adulMay'];
    
    $adulMayHasCursos->crear($curso,$tutor,$estado,$fecha,$adulMay);
}