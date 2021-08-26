<?php
include_once '../modelo/Usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new Usuario();


if (!empty($_SESSION['us_tipo'])) {
    switch ($_SESSION['us_tipo']) {
        case 1:
            header('Location: ../vista/buscador_alumnos.php');
            break;

        case 2:
            header('Location: ../vista/editar_alumno.php');
            break;

        default:
            # code...
            break;
    }
} else {
    
    if (!empty($usuario->loguearse($user, $pass)=="logueado")) {
        $usuario->obtenerDatosLogueo($user);
        foreach ($usuario->objetos as $objeto) {
            
            $_SESSION['usuario'] = $objeto->id_usuario;
            $_SESSION['us_tipo'] = $objeto->id_tipousuario;
            $_SESSION['nombre_us'] = $objeto->nombre_usuario;
        }
        switch ($_SESSION['us_tipo']) {
            case 1:
                header('Location: ../vista/buscador_alumnos.php');
                break;

            case 2:
                header('Location: ../vista/editar_alumno.php');
                break;

            default:
                # code...
                break;
        }
    } else {
        header('Location: ../index.php');
    }
}
