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
        <br>
        <section>
            <div class="container-fluid">
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>PARTICIPANTES POR MATRICULAR</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-btn-add">
                            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search1">
                            <i class="fa fa-search lupa" aria-hidden="true"></i>

                        </div>
                        <table id="tabla" class="display table table-hover text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Tutor</th>
                            </tr>
                        </thead>
                        <tbody id="lista_estudiantes"></tbody>
                    </table>
                    </div>
                    <div class="card-footer">
                    </div>

                </div>
            </div>
        </section>

    </div>
    <!-- TABLITA PARTICIPANTES-->
    <div class="content-wrapper container top">
        <br>
        <section>
            <div class="container-fluid">
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>LISTADO DE PARTICIPANTES</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-btn-add">
                            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search1">
                            <i class="fa fa-search lupa" aria-hidden="true"></i>

                        </div>
                        <table id="tabla" class="table table-striped table-bordered table-responsive" style="height: 500px">
                            <thead>
                                <tr>
                                    <th>N. Cedula</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody id="adultoMay_tabCrs">
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