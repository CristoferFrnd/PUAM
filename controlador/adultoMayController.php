<?php
include '../modelo/AdulMay.php';
$adulMay = new AdulMay();

if ($_POST['funcion'] == 'listar') {
    $adulMay->buscar();
    $json = array();
    foreach ($adulMay->objetos as $objeto) {
        $json[] = array(
            'id_adulMay' => $objeto->id_adMay,
            'nombre' => $objeto->nombre_adMay,
            'telefono' => $objeto->telefonoC_AdMay,
            'celular' => $objeto->celular_AdMay,
            'correo' => $objeto->correoE_AdMay
        );
    }
    $jsonString= json_encode($json);
    echo $jsonString;  
}

if ($_POST['funcion'] == 'registrar') {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $telefonoC = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    
    $adulMay->crear($cedula, $nombre, $telefonoC, $celular, $correo);
}

if ($_POST['funcion'] == 'editar') {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $telefonoC = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $adulMay->editar($cedula, $nombre, $telefonoC, $celular, $correo);
}

if ($_POST['funcion'] == 'eliminar') {
    $id_am = $_POST['id_am'];
    $adulMay->eliminar($id_am);
}

if ($_POST['funcion'] == 'buscar_us_id') {
    $id=$_POST['id_us'];
    $adulMay->buscar_am_id($id);
    $json = array();
    foreach ($adulMay->objetos as $objeto) {
        $json[] = array(
            'adulMay' => $objeto->id_adMay,
            'nombre' => $objeto->nombre_adMay,
            'telefono' => $objeto->telefonoC_AdMay,
            'celular' => $objeto->celular_AdMay,
            'correo' => $objeto->correoE_AdMay
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}
