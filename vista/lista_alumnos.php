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

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Estudiante (Facilitador)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-editar-alumno">
                        <div class="form-row">

                            <div class="col-md-2"></div>

                            <div class="form-group col-md-4">
                                <label for="nombreE">Nombre</label>
                                <input type="text" class="form-control" id="nombreE" placeholder="Nombre" required="true" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cedulaE">N. Cedula</label>
                                <input type="text" class="form-control" id="cedulaE" placeholder="Cedula" required="true" disabled>
                            </div>

                            <div class="col-md-2"></div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-2"></div>

                            <div class="form-group col-md-4">
                                <label for="correoE">Correo</label>
                                <input type="text" class="form-control" id="correoE" placeholder="Correo" required="true" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cursos">Curso</label>
                                <br />
                                <input type="text" class="form-control" id="cursoE" disabled>
                            </div>


                        </div>



                        <div class="form-row">
                            <div class="col-md-2"></div>

                            <div class="form-group col-md-4">
                                <label for="horasRE">Horas Realizadas</label>
                                <input type="number" class="form-control" id="horasRE" placeholder="Horas Realizadas" required="true">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="telE">Telefono</label>
                                <input type="text" class="form-control" id="telE" placeholder="Telefono" required="true">
                            </div>



                            <div class="col-md-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="content-wrapper container top">
        <br>
        <section>


            <div class="card card-success animate__animated animate__bounceInRight">
                <div class="titulo-tabla">
                    <h3>LISTADO DE ESTUDIANTES (FACILITADORES)</h3>
                </div>

                <div class="card-body">
                    <div class="container-btn-add">
                        <div>
                            <button type="button" class="btn btn-primary" id="reporteG"><i class="fas fa-file-pdf"></i> Reporte</button>
                        </div>
                    </div>
                    <table id="tEst" class="display table-sm table-hover text-nowrap table-responsive-lg" style="width:100%">
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
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>

            </div>
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