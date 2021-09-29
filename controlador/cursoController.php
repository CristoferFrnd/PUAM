<?php
include '../modelo/Curso.php';
$curso = new Curso();

if ($_POST['funcion'] == 'registrar') {

    $nombre = $_POST['nombre'];
    $facultad = $_POST['facultad'];

    $curso->crear($nombre, $facultad);
}

if ($_POST['funcion'] == 'listar') {
    $curso->buscar();
    $json = array();
    foreach ($curso->objetos as $objeto) {
        $json[] = array(
            'id_crs' => $objeto->id_crs,
            'nombre_crs' => $objeto->nombre_crs,
            'facultad_crs' => $objeto->facultad_crs           
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'listar_no_mat') {
    $id = $_POST['id'];
    $curso->buscar_no_mat($id);
    $json = array();
    foreach ($curso->objetos as $objeto) {
        $json[] = array(
            'id_crs' => $objeto->id_crs,
            'nombre_crs' => $objeto->nombre_crs,
            'facultad_crs' => $objeto->facultad_crs           
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'buscar_id') {
    $id = $_POST['ID'];
    $curso->buscar_curso_id($id);
    $json = array();
    foreach ($curso->objetos as $objeto) {
        $json[] = array(
            'id_crs' => $objeto->id_crs,
            'nombre_crs' => $objeto->nombre_crs,
            'facultad_crs' => $objeto->facultad_crs
                        
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}

