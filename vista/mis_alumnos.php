<?php
session_start();
include_once 'layouts/header.php';
?>


<title>Ingresar Nuevos Alumnos</title>
<?php
if ($_SESSION['us_tipo'] == 2) {
    include_once 'layouts/nav_al.php';
} else {
    echo '<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link type="text/css" href="../css/login.css" rel="stylesheet">';
}
?>

<body>

    <input type="text" id="us_id" value="<?php echo $_SESSION['usuario']; ?>" hidden="true">
    <input type="text" id="us_tipo" value="<?php echo $_SESSION['us_tipo']; ?>" hidden="true">

    <!-- TABLITA-->
    <div class="content-wrapper container top">
        <br>
        <section>
            <div class="container-fluid">
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>LISTADO DE ALUMNOS</h3>
                    </div>
                    <div class="card-body">

                        <table id="alParti" class="display table table-hover text-nowrap table-responsive-lg" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N. Cedula</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>

                </div>
            </div>
        </section>

    </div>

</body>
<?php
include_once 'layouts/footer.php';
?>

<script src="../js/curso.js"></script>
<script src="../js/adultoMay.js"></script>