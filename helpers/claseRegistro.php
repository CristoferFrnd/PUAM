<?php
include '../modelo/Clase.php';
session_start();
$clase = new Clase();

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        $fecha = $_POST['fecha'];
        $duracion = $_POST['duracion'];
        $adulM = $_POST['adulM'];
        $tema = $_POST['tema'];
        $tutor = $_SESSION['usuario'];
        $tipo = $_POST['tclases'];
        $curso = $_POST['us_curso_id'];

        // $fecha = '2021-08-30';
        // $duracion = 2;
        // $adulM = '3456789';
        // $tema = 'prueba';
        // $tutor = '1798765432';
        // $curso = 1;
        // $tipo = 1;
        
        echo $fecha."\n".$duracion."\n".$adulM."\n".$tema."\n".$tutor."\n".$curso."\n".$tipo;
        $clase->crear($fecha, $duracion, $imgContent, $adulM, $tema, $tutor, $curso, $tipo);
        header('Location: ../vista/registrar_clase.php');
    }
}
