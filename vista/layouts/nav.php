<!-- Tell the browser to be responsive to screen width -->
<link rel="stylesheet" href="../css/css/bootstrap.min.css">
<link type="text/css" href="../css/login.css" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo $_SESSION['nombre_us']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="buscador_alumnos.php">Alumnos Registrados</a>
                <a class="nav-item nav-link" href="registro_alumnos.php">Ingresar Nuevos Alumnos</a>
                <a class="nav-item nav-link" href="../controlador/logout.php" style="color: red;">Salir</a>
            </div>
        </div>
    </nav>
</header>



