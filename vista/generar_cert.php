<?php
session_start();
include_once 'layouts/header.php';
?>


<title>Alumnos</title>
<?php
if ($_SESSION['us_tipo'] == 1) {
    include_once 'layouts/nav.php';
} else {
    echo '<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link type="text/css" href="../css/login.css" rel="stylesheet">';
}
?>

<body>

    <div class="content-wrapper container top">
        <br>
        <section>
            <div class="card card-success animate__animated animate__bounceInRight" id="contTF" style="display: none;">

                <div class="card-body">
                    <div class="container-btn-add">
                        <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search">
                        <i class="fa fa-search lupa" aria-hidden="true"></i>
                    </div>
                    <table id="tEstFin" class="display table-sm table-hover text-nowrap table-responsive-lg" style="width:100%">
                        <thead>
                            <tr>
                                <th>N. Cedula</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>H Totales</th>
                                <th>Curso</th>
                                <th>Certificado</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>

            </div>
            <br>

    </div>
    </section>

        <!-- modal confirmar generación certificado -->
        <div class="modal fade" id="certConf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header" id="mensajeConf">
                    Confirmación
                </div>
                <div id="msgConf" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="confirmar_cert" class="btn btn-danger" data-dismiss="modal">Si</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<?php
include_once 'layouts/footer.php';
?>

<script src="../js/alumno.js"></script>
<script src="../js/curso.js"></script>