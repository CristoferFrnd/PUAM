<?php
include '../modelo/Clase.php';
session_start();
$clase = new Clase();

    $id = 29;
    $clase->buscar_clase_id($id);
    $json = array();
    foreach ($clase->objetos as $objeto) {
        ?>
        <img src="data:image/png;base64,<?php echo base64_encode($objeto -> evidencia_clase); ?>"/>
    <?php
    }
?>