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


if ($_POST['funcion'] == 'adul_std') {
    $id = $_POST['ID'];
    
    $adulMayhasCursos->adul_curso_std($id);
    $json = array();
    foreach ($adulMayHasCursos->objetos as $objeto) {
        $json[] = array(
            'id_adMay' => $objeto->id_adMay,
            'nombre_adMay' => $objeto->nombre_adMay
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}
