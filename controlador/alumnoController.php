<?php
include '../modelo/Usuario.php';
$usuario = new Usuario();

if ($_POST['funcion'] == 'listar') {
    $usuario->buscar();
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre' => $objeto->nombre_usuario,
            'correo' => $objeto->correoIns_usuario,
            'horasN' => $objeto->horasNecesarias_usuario,
            'horasR' => $objeto->horasRealizadas_usuario,
            'curso'  => $objeto->nombre_crs
        );
    }
    $jsonString= json_encode($json);
    echo $jsonString;  
}

if ($_POST['funcion'] == 'registrar') {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $horasN = $_POST['horasN'];
    $horasR = $_POST['horasR'];
    $curso = $_POST['curso'];

    $usuario->crear($nombre, $contrasena, $cedula, $correo, $horasN, $horasR, $curso);
}

if ($_POST['funcion'] == 'editar') {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $id_us = $_POST['id_us'];
    $correo = $_POST['correo'];
    $usuario->editar($id_us, $nombre, $contrasena, $correo);
}

if ($_POST['funcion'] == 'eliminar') {
    $id_us = $_POST['id_us'];
    $usuario->eliminar($id_us);
}

if ($_POST['funcion'] == 'buscar_us_id') {
    $id=$_POST['id_us'];
    $usuario->buscar_us_id($id);
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'nombre' => $objeto->nombre_usuario,
            'correo' => $objeto->correoIns_usuario,
            'horasN' => $objeto->horasNecesarias_usuario,
            'horasR' => $objeto->horasRealizadas_usuario,
            'curso'  => $objeto->nombre_crs
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}
