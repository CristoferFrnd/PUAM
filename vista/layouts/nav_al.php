<!-- Tell the browser to be responsive to screen width -->
<link rel="stylesheet" href="../css/css/bootstrap.min.css">
<link type="text/css" href="../css/styles.css" rel="stylesheet">
<link type="text/css" href="../css/css/datatables.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bw d-flex">
        <div>
            <img class="img-logo" src="../assets/img/logo.png" width="200" height="auto">
        </div>
        <div>
            <a class="navbar-brand" href="editar_datos.php"><?php echo $_SESSION['nombre_us'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
            <div class="navbar-nav">
                
                <a class="nav-item nav-link navbar-brand" href="registrar_clase.php">Clases</a>
                <a class="nav-item nav-link navbar-brand" href="mis_alumnos.php">Mis Alumnos</a>
                <a class="nav-item nav-link navbar-brand" href="../controlador/logout.php" style="color: red;">Salir</a>
            </div>
        </div>

    </nav>
</header>