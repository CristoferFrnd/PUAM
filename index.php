<?php
session_start();
if (!empty($_SESSION['us_tipo'])) {
    header('Location: controlador/loginController.php');
} else {
    session_destroy();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,700&display=swap" rel="stylesheet">
        <link type="text/css" href="./css/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/css/bootstrap.min.css">
        <link type="text/css" href="./css/login2.css" rel="stylesheet">

    </head>

    <body style="background-color: #024873">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-4 login-form-1">
                    <img src="assets/img/logoP.png" class="img-fluid" />
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
                            <input type="submit" class="btn" style="background: #0477BF;color: white;" value="Ingresar">
                        </div>

                    </form>


                </div>
                <div class="col-md-8 login-form-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/carrousel/uce1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/carrousel/uce2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/carrousel/uce3.jpg" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/carrousel/uce4.jpg" alt="First slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container login-container2">
            <p align="center" class="titulo"><strong>Sistema desarrollado por la facultad de Ingeniería y Ciencias Aplicadas</strong></p>
            <p align="center" class=><strong>Carrera de Ingeniería Informática</strong></p>
            <div class="row justify-content-md-center">
                <div class="col-md-4 login-form-1">
                    <p align="left" style="margin-top:0px;margin-bottom:0px"><strong>Desarrolladores:</strong></p>
                    <p align="center" style="margin-top:0px;margin-bottom:0px">- Sofía Alemán</p>
                    <p align="center" style="margin-top:0px;margin-bottom:0px">- Cristian Pujota</p>
                </div>
                <div class="col-md-4 login-form-1">
                    <p align="left" style="margin-top:0px;margin-bottom:0px"><strong>Tutores:</strong></p>
                    <p align="center" style="margin-top:0px;margin-bottom:0px">- Alicia Andrade PhD</p>
                    <p align="center" style="margin-top:0px;margin-bottom:0px">- Santiago Morales PhD</p>
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