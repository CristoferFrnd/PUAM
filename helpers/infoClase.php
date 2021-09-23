<?php
    //DB details
    $dbHost     = 'bjz1ow2z07o7esnyhovd-mysql.services.clever-cloud.com';
    $dbUsername = 'uvw59fuzhyiqkeos';
    $dbPassword = '2cnjrFii8ZMOdzVWiKmG';
    $dbName     = 'bjz1ow2z07o7esnyhovd';
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, '3306');
    
    //Check connection
    if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
    }

    $id = $_POST['ID'];
    
    //Get image data from database
    $result = $db->query("SELECT id_clase, fecha_clase, duracion_clase, evidencia_clase, tema_clase, nombre_usuario AS tutor, nombre_crs, descripcion_tipoClase, nombre_adMay, id_adMay FROM clase
    JOIN curso on cursos_id_crs=id_crs
    JOIN tipoClase on tipoClase_id_tipoClase=id_tipoClase
    JOIN adultoMay on adultoMay_id_adMay=id_adMay
    JOIN usuario on tutores_id_tutor=id_usuario 
    WHERE id_clase = $id"
    );

    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        $img = 'data:image/png;base64,'.base64_encode($imgData['evidencia_clase']);
    }

    $json = array();
    $json[] = array(
        'id_clase' => $imgData['id_clase'],
        'fecha_clase' => $imgData['fecha_clase'],
        'duracion_clase' => $imgData['duracion_clase'],
        'evidencia' => $img,
        'tema_clase' => $imgData['tema_clase'],
        'tutor'  => $imgData['tutor'],
        'nombre_crs' => $imgData['nombre_crs'],
        'descripcion_tipoClase' => $imgData['descripcion_tipoClase'],
        'nombre_adMay'  => $imgData['nombre_adMay'],
        'id_adMay'  => $imgData['id_adMay'],
        
    );
    $jsonString = json_encode($json);
    echo $jsonString;

    
?>
