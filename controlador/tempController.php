<?php
include '../modelo/Temp.php';
$temp = new Temp();

if ($_POST['funcion'] == 'registrar') {

    $cedula = $_POST['cedula'];
    $id_curso = $_POST['id_curso'];
    $temp->crear($cedula, $id_curso);
}

if ($_POST['funcion'] == 'listar') {
    $curso->buscar();
    $json = array();
    foreach ($curso->objetos as $objeto) {
        $json[] = array(
            'id_adulMay' => $objeto->id_adulMay,
            'id_curso' => $objeto->id_curso      
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
