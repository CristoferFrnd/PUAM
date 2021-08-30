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
