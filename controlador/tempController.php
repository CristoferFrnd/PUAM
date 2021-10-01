<?php
include '../modelo/Temp.php';
session_start();
$temp = new Temp();

if ($_POST['funcion'] == 'registrar') {

    $cedula = $_POST['cedula'];
    $id_curso = $_POST['id_curso'];
    $temp->crear($cedula, $id_curso);
}

if ($_POST['funcion'] == 'listar') {
    $temp->buscar();
    $json = array();
    foreach ($temp->objetos as $objeto) {
        $json[] = array(
            'id_adulMay' => $objeto->id_adulMay,
            'id_curso' => $objeto->id_curso      
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'listar_crs') {
    $id=$_SESSION['id_curso']; 
    $temp->listar_crs(1);
    $json = array();
    foreach ($temp->objetos as $objeto) {
        $json[] = array(
            'id_adulMay' => $objeto->id_adulmay,
            'nombre' => $objeto->nombre_admay,  
            'id_curso' => $objeto->id_curso,  
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}

if ($_POST['funcion'] == 'eliminar') 
{   
    $curso=$_POST['id_curso']; 
    $id = $_POST['adulMay'];
    $temp->eliminar($id,$curso);
}