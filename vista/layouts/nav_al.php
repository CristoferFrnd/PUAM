<!-- Tell the browser to be responsive to screen width -->
<link rel="stylesheet" href="../css/css/bootstrap.min.css">
<link type="text/css" href="../css/login.css" rel="stylesheet">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bw d-flex">
        <div>
        <a class="navbar-brand" href="editar_datos.php"><?php echo $_SESSION['nombre_us']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>

        <div class="collapse navbar-collapse justify-content-start " id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link navbar-brand" href="registrar_clase.php">Clases</a>
                <a class="nav-item nav-link navbar-brand" href="../controlador/logout.php" style="color: red;">Salir</a>
                
            </div>
        </div>
        <div>
        <img class="img-logo" src="../img/logo.png" width="200" height="auto">
        </div>
    </nav>
</header>



