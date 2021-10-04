<!-- Tell the browser to be responsive to screen width -->
<link rel="stylesheet" href="../css/css/bootstrap.min.css">
<link type="text/css" href="../css/styles.css" rel="stylesheet">
<link type="text/css" href="../css/css/datatables.css" rel="stylesheet">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-styles fixed-top">
        <div>
            <img class="img-logo" src="../assets/img/logo.png" width="200" height="auto">
        </div>


        <a class="navbar-brand" href="editar_datos.php"><?php echo $_SESSION['nombre_us'] ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end nav-styles" id="navbarNavAltMarkup">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="buscador_clase.php">Clases<span class="sr-only">(current)</span></a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Facilitadores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="lista_alumnos.php">Listar</a>
                        <a class="dropdown-item" href="generar_cert.php">Certificado</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrar_am.php">Participantes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../controlador/logout.php" style="color: red;">Salir</a>
                </li>
            </ul>
            </li>
        </div>
    </nav>
</header>