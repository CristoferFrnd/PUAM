<?php
include '../modelo/Clase.php';
$clase = new Clase();


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        // $fecha = $_POST['fecha'];
        // $duracion = $_POST['duracion'];
        // $adulM = $_POST['adulM'];
        // $tema = $_POST['tema'];
        // $tutor = $_POST['tutor'];
        // $curso = $_POST['curso'];
        // $tipo = $_POST['tipo'];

        $fecha = '2021-08-30';
        $duracion = 2;
        $adulM = '3456789';
        $tema = 'prueba';
        $tutor = '234567890';
        $curso = 1;
        $tipo = 2;

        $clase->crear($fecha, $duracion, $imgContent, $adulM, $tema, $tutor, $curso, $tipo);
    }
}
