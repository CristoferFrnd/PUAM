<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,700&display=swap" rel="stylesheet">
    <link type="text/css" href="./css/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
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
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card">
                <div class="card-body">
                    <form action="controlador/loginController.php" method="post">
                        <h2>Gestion Alumnos</h2>
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input type="password" name="pass" class="form-control">
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-primary" value="Iniciar">
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
    <script src="js/login.js"></script>

</html>

<?php
}
?>