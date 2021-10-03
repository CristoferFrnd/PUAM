<?php
include '../modelo/Clase.php';
$clase = new Clase();

if ($_POST['funcion'] == 'registrar') {

    $check = getimagesize($_POST['evidencia']);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }

    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];
    $adulM = $_POST['adulM'];
    $tema = $_POST['tema'];
    $tutor = $_POST['tutor'];
    $curso = $_POST['curso'];
    $tipo = $_POST['tipo'];

    $clase->crear($fecha, $duracion, $imgContent, $adulM, $tema, $tutor, $curso, $tipo);
}

if ($_POST['funcion'] == 'listar') {
    $clase->buscar();
    $json = array();
    foreach ($clase->objetos as $objeto) {
        $json['data'][] = $objeto;
    };
    $jsonString = json_encode($json);
    echo $jsonString;
}

// if ($_POST['funcion'] == 'listar') {
//     $clase->buscar();
//     $json = array();
//     foreach ($clase->objetos as $objeto) {
//         $json[] = array(
//             'id_clase' => $objeto->id_clase,
//             'fecha_clase' => $objeto->fecha_clase,
//             'duracion_clase' => $objeto->duracion_clase,
//             'tema_clase' => $objeto->tema_clase,
//             'tutor'  => $objeto->tutor,
//             'nombre_crs' => $objeto->nombre_crs,
//             'descripcion_tipoClase' => $objeto->descripcion_tipoclase,
//             'nombre_adMay'  => $objeto->nombre_admay,
//             'id_adMay'  => $objeto->id_adMay,
//         );
//     }
//     $jsonString = json_encode($json);
//     echo $jsonString;
// }

if ($_POST['funcion'] == 'buscar_id') {
    $id = $_POST['ID'];
    $clase->buscar_clase_id($id);
    $json = array();
    foreach ($clase->objetos as $objeto) {
        $json[] = array(
            'fecha_clase' => $objeto->fecha_clase,
            'duracion_clase' => $objeto->duracion_clase,
            'tema_clase' => $objeto->tema_clase,
            'tutor'  => $objeto->tutor,
            'nombre_crs' => $objeto->nombre_crs,
            'descripcion_tipoClase' => $objeto->descripcion_tipoclase,
            'nombre_adMay'  => $objeto->nombre_admay,
            'id_adMay'  => $objeto->id_admay
            
        );
    }
    $jsonString = json_encode($json[0]);
    echo $jsonString;
}

if ($_POST['funcion'] == 'buscar_tclase') {
    $clase->buscar_tclase();
    $json = array();
    foreach ($clase->objetos as $objeto) {
        $json[] = array(
            'id_tcrs' => $objeto->id_tipoclase,
            'nombre_tcrs' => $objeto->descripcion_tipoclase
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'buscar_am_al') {
    $id = $_POST['ID'];
    $clase->buscar_adulM_est($id);
    $json = array();
    foreach ($clase->objetos as $objeto) {
        $json[] = array(
            'id_adMay' => $objeto->id_admay,
            'nombre_admay' => $objeto->nombre_admay,
            'celular_admay' => $objeto->celular_admay, 
            'telefonoc_admay' => $objeto->telefonoc_admay,
            'correoe_admay' => $objeto->correoe_admay,
            'activ_admay' => $objeto->activ_admay
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'buscar_clase_alumno') {
    $id = $_POST['id'];
    $clase->buscar_clase_alumno($id);
    $json = array();
    foreach ($clase->objetos as $objeto) {
        $json[] = array(
            'id_clase' => $objeto-> id_clase,
            'fecha_clase' => $objeto->fecha_clase,
            'duracion_clase' => $objeto->duracion_clase,
            'tema_clase' => $objeto->tema_clase,
            'tutor'  => $objeto->tutor,
            'nombre_crs' => $objeto->nombre_crs,
            'id_crs' => $objeto->id_crs,
            'descripcion_tipoClase' => $objeto->descripcion_tipoclase,
            'nombre_adMay'  => $objeto->nombre_admay,
            'id_adMay'  => $objeto->id_admay
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
