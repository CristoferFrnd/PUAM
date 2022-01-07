<?php
session_start();
include_once 'layouts/header.php';
?>


<title>Tutores</title>
<?php
if ($_SESSION['us_tipo'] == 3) {
    include_once 'layouts/nav_tut.php';
} else {
    echo '<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link type="text/css" href="../css/login.css" rel="stylesheet">';
}
?>

<body>

    <!-- TABLITA MATRICULAR-->
    <div class="content-wrapper container top">
        <!-- TABLITA PARTICIPANTES-->
        <br>
        <section>
            <div class="container-fluid">
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>LISTADO DE PARTICIPANTES</h3>
                    </div>
                    <div class="card-body">

                        <table id="tPart" class="display table table-hover text-nowrap table-responsive-lg" style="width:100%">
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
<script src="../js/adultoMay.js"></script>