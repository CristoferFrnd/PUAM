<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,700&display=swap" rel="stylesheet">
    <link type="text/css" href="./css/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link type="text/css" href="./css/styles.css" rel="stylesheet">
    <link type="text/css" href="./css/login.css" rel="stylesheet">
    <title>PUAM</title>

</head>

<?php
session_start();
if (!empty($_SESSION['us_tipo'])) {
    header('Location: controlador/loginController.php');
} else {
    session_destroy();
?>

    <body>

        <!-- <div class="contenedor">
            <div class="left">
                <div class="card">
                    <img src="assets/img/logoP.png" alt="" class="img-login">
                    <div class="card-body">
                        <form id="form-login">
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <input type="text" id="user" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <input type="password" id="pass" class="form-control">
                                <span id="avisoD" class="text-danger text-bold">text</span>
                            </div>
                            <div class="form-group ">
                                <input type="submit" class="btn btn-primary" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="page">
            <div class="container">
                <div class="left">
                    <div class="login">
                        <h1>UCE</h1>
                        <h3>Desarrolladores</h3>
                        <ul>
                            <li>Sofía Alemán</li>
                            <li>Cristian Pujota</li>
                        </ul>
                        <h3>Tutores</h3>
                        <ul>
                            <li>Santiago Morales</li>
                            <li>Alicia Andrade</li>
                        </ul>
                    </div>

                </div>
                <div class="right">
                    <div style="width: 100%;">
                        <img src="assets/img/logoP.png" class="img-login" alt="">
                    </div>
                    <form class="form" id="form-login">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" id="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="pass" class="form-control">
                            <span id="avisoD" class="text-danger text-bold " style="position: absolute;">text</span>
                        </div>
                        <div class="form-group mt-4">
                        <input type="submit" class="btn btn-primary" value="Ingresar">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
    <footer class="main-footer">
        <div class="fixed-bottom text-center text-light">
            <b>Version</b> 1.0

            Desarrollado por <strong><a>>####</a></strong> Todos los derechos reservados.
        </div>
    </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>

</html>

<?php
}
?>