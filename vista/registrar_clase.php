<?php
session_start();
if ($_SESSION['us_tipo'] == 2) {

    include_once 'layouts/header.php';

?>
    <title>Alumnos Registrados</title>
    <?php
    include_once 'layouts/nav_al.php';
    ?>

    <div class="content-wrapper container">
        <br>

        <input type="text" id="us_tipo" value="<?php echo $_SESSION['us_tipo']; ?>" hidden="true">
        <input type="text" id="us_id" value="<?php echo $_SESSION['usuario']; ?>" hidden="true">
        <input type="text" id="us_curso" value="<?php echo $_SESSION['curso_us']; ?>" hidden="true">


        <section>
            <div class="container-fluid top">

                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="titulo-tabla">
                        <h3>LISTADO DE CLASES</h3>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarClaseModal"><i class="fas fa-user-plus"> AGREGAR</i></button>
                    </div>
                    <div class="card-body">
                        <div class="container-btn-add">
                            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search2">
                            <i class="fa fa-search lupa" aria-hidden="true"></i>
                            <div style="padding-left: 20px">
                                <button type="button" class="btn btn-primary" id="reporteC"><i class="fas fa-file-pdf"></i> Informe</button>
                            </div>
                        </div>

                        <table id="tabla-clases" class="table table-striped table-bordered table-responsive" style="width:100%; height:500px">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Participante</th>
                                    <th>Curso</th>
                                    <th>Tema</th>
                                    <th>Tipo de Clase</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody id="clases_alumno">
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>

                </div>
            </div>
        </section>
    </div>

    <!-- MODAL DETALLE CLASE -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDetalle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle de clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <input type="text" id="id_clase" hidden="true">
                        <div class="form-group col-md-4">
                            <label for="fecha">Fecha</label>
                            <input type="text" class="form-control" id="fechaD" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="duracion">Duración (H)</label>
                            <input type="text" class="form-control" id="duracionD" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="curso">Curso</label>
                            <input type="text" class="form-control" id="cursoD" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="tema">Tema tratado</label>
                        <input type="text" class="form-control" id="temaD" disabled>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="adulM">Participante</label>
                            <input type="text" class="form-control" id="adulMD" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tutor">Tutor</label>
                            <input type="text" class="form-control" id="tutorD" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                    </div>

                    <div class="form-row img-responsive">
                        <label for="img">Evidencia </label>
                        <img src="" class="img-fluid" style="width:100%" alt="Eniun" id="img">
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

            </div>

            <div class="modal-footer">

            </div>
        </div>

    </div>

    <!-- MODAL AGREGAR CLASE -->
    <div class="modal fade" tabindex="-1" role="dialog" id="agregarClaseModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../helpers/claseRegistro.php" enctype="multipart/form-data">
                        <input type="text" name="us_curso_id" id="us_curso_id" value="<?php echo $_SESSION['curso_id']; ?>" hidden="true">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="duracion">Duración (H)</label>
                                <input type="text" class="form-control" id="duracion" name="duracion" requiered="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="curso">Curso</label>
                                <input type="text" class="form-control" id="curso" name="curso" requiered="true" disabled>
                                <input type="hidden" id="id_curso" name="id_curso">
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="tema">Tema tratado</label>
                            <input type="text" class="form-control" id="tema" name="tema" requiered="true">
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="adulM">Participante</label>
                                <!--<input type="text" class="form-control" id="adulM" name="adulM" requiered="true">-->
                                <br />
                                <select name="adulM" class="form-select form-select-lg mb-4 form-control" aria-label=".form-select-lg example" id="ad_al">

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tclase">Tipo de Clase</label>
                                <br />
                                <select name="tclases" class="form-select form-select-lg mb-4 form-control" aria-label=".form-select-lg example" id="tclases">
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="image">Evidencia: </label>
                                <input type="file" name="image" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Registrar" class="btn btn-primary" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>

    <!-- <input type="button" value="Prueba" id="prueba"> -->
    </body>


<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../controlador/loginController.php');
}
?>
<script src="../js/clase.js"></script>