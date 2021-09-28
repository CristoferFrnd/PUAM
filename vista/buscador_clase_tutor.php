<?php
session_start();
if ($_SESSION['us_tipo'] == 3) {

    include_once 'layouts/header.php';
?>

    <title>Alumnos Registrados</title>
    <?php
    include_once 'layouts/nav.php';
    ?>
    <div class="content-wrapper container top">
        <br>
        <section>
            <div class="container-fluid">

                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>LISTADO DE TUTORES</h3>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAgregar"><i class="fas fa-user-plus"></i> AGREGAR</button>
                    </div>

                    <div class="card-body">
                        <div class="container-btn-add">
                            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search">
                            <i class="fa fa-search lupa" aria-hidden="true"></i>
                            <div style="padding-left: 20px">
                                <button type="button" class="btn btn-primary" id="reporteG"><i class="fas fa-file-pdf"></i> Reporte</button>
                            </div>

                        </div>
                        <table id="tabla" class="table table-striped table-bordered table-responsive" style="height:500px">
                            <thead>
                                <tr>
                                    <th>N. Cedula</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>H Totales</th>
                                    <th>Curso</th>

                                </tr>
                            </thead>
                            <tbody id="alumnosCrs">
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
} else {
    header('Location: ../index.php');
}
?>
<script src="../js/alumno.js"></script>