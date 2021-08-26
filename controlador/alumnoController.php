<?php
include '../modelo/Usuario.php';
$usuario = new Usuario();

if ($_POST['funcion'] == 'listar') {
    $usuario->buscar();
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'n_cedula' => $objeto->n_cedula,
            'apellidos' => $objeto->apellidos,
            'nombre' => $objeto->nombre,
            'correo' => $objeto->correo,
            'telefono' => $objeto->telefono
        );
    }
    $jsonString= json_encode($json);
    echo $jsonString;  
}

if ($_POST['funcion'] == 'registrar') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $n_usuario = $_POST['n_usuario'];
    $contrasena = $_POST['contrasena'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $usuario->crear($nombre, $apellidos, $contrasena, $n_usuario, $cedula, $correo, $telefono);
}

if ($_POST['funcion'] == 'editar') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $n_usuario = $_POST['n_usuario'];
    $contrasena = $_POST['contrasena'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $id_us = $_POST['id_us'];
    $usuario->editar($id_us, $nombre, $apellidos, $contrasena, $n_usuario, $cedula, $correo, $telefono);
}

if ($_POST['funcion'] == 'eliminar') {
    $id_us = $_POST['ID'];
    $usuario->eliminar($id_us);
}



if ($_POST['funcion'] == 'buscar_us_id') {
    $id=$_POST['ID'];
    $usuario->buscar_us_id($id);
    $json = array();
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'id_usuario' => $objeto->id_usuario,
            'n_cedula' => $objeto->n_cedula,
            'apellidos' => $objeto->apellidos,
            'nombre' => $objeto->nombre,
            'n_usuario' => $objeto->n_usuario,
            'correo' => $objeto->correo,
            'telefono' => $objeto->telefono,
            'contrasena' => $objeto->contrasena
            
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}
