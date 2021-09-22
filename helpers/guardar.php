<?php
include 'Conexion.php';

    $nombre = $_POST['nombre'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $query = "INSERT INTO pruebaImg(nombre, imagen) VALUES($nombre, $imagen)";
    $res = $db->query($query)
?>