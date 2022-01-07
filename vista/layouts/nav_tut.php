<!-- Tell the browser to be responsive to screen width -->
<link rel="stylesheet" href="../css/css/bootstrap.min.css">
<link type="text/css" href="../css/styles.css" rel="stylesheet">
<link type="text/css" href="../css/css/datatables.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-styles fixed-top">
        <div>
            <img class="img-logo" src="../assets/img/logo.png" width="200" height="auto">
        </div>


        <a class="navbar-brand" href="editar_datos.php"><?php echo $_SESSION['nombre_us'] ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#buscador_clase_tutor.php">Clases<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrar_alumno_tutor.php">Facilitadores</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Participantes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_am_tutor.php">Listar</a>
                        <a class="dropdown-item" href="matricular_am_tutor.php">Matricular</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../controlador/logout.php" style="color: red;">Salir</a>
                </li>
            </ul>
            </li>
        </div>
    </nav>

</header>