<?php
session_start();
include '../modelo/Clase.php';
//include '../modelo/Usuario.php';
$clase = new Clase();
//$usuario = new Usuario();

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

        $clase->crear($fecha, $duracion, $imgContent, $adulM, $tema, $tutor, $curso, $tipo);
        $clase->agregarHoras($tutor,$duracion);

        header('Location: ../vista/registrar_clase.php');
    }
}
