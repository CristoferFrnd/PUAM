<?php
session_start();
include_once '../modelo/Usuario.php';
$usuario = new Usuario();

if (!empty($_SESSION['us_tipo'])) {
    switch ($_SESSION['us_tipo']) {
        case 1:
            header('Location: ../vista/buscador_clase.php');
            break;

        case 2:
            header('Location: ../vista/registrar_clase.php');
            break;
        case 3: 
            header('Location: ../vista/buscador_clase_tutor.php');
            break;

        default:
            # code...
            break;
    }
} else {
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    if (!empty($usuario->loguearse($user, $pass)=="logueado")) {
        $usuario->obtenerDatosLogueo($user);
        foreach ($usuario->objetos as $objeto) {
            
            $_SESSION['usuario'] = $objeto->id_usuario;
            $_SESSION['us_tipo'] = $objeto->id_tipousuario;
            $_SESSION['nombre_us'] = $objeto->nombre_usuario;
            $_SESSION['curso_us'] = $objeto->nombre_crs;
            $_SESSION['curso_id'] = $objeto->cursos_id_crs;
        }
        switch ($_SESSION['us_tipo']) {
            case 1:
            header('Location: ../vista/buscador_clase.php');
            break;

        case 2:
            header('Location: ../vista/registrar_clase.php');
            break;
        case 3: 
            header('Location: ../vista/buscador_clase_tutor.php');
            break;

            default:
                # code...
                break;
        }
    } else {
        echo "nologin";
    }
}
?>
