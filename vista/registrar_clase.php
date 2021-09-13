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


        <section>
            <div class="container-fluid">
                <div class="container-btn-add">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarClaseModal"><i class="fas fa-user-plus"></i></button>
                </div>
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="card-body">
                        <table id="tabla-clases" class="display table table-hover text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Adulto Mayor</th>
                                    <th>Curso</th>
                                    <th>Tema</th>
                                    <th>Tipo de Clase</th>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalle de clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../helpers/claseRegistro.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <input type="text" id="id_clase" hidden="true">
                            <div class="form-group col-md-4">
                                <label for="fecha">Fecha</label>
                                <input type="text" class="form-control" id="fecha" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="duracion">Duración (H)</label>
                                <input type="text" class="form-control" id="duracion" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="curso">Curso</label>
                                <input type="text" class="form-control" id="curso" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="tema">Tema tratado</label>
                            <input type="text" class="form-control" id="tema" disabled>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="adulM">Adulto mayor</label>
                                <input type="text" class="form-control" id="adulM" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tutor">Tutor</label>
                                <input type="text" class="form-control" id="tutor" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                        </div>

                        <div class="form-row">
                            <label for="img">Evidencia</label>
                            <input type="text" class="form-control" id="img" disabled>

                        </div>

                        Select image to upload:
                        <input type="file" name="image" />
                        <input type="submit" name="submit" value="registrar" />
                    </form>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>

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
                    <form method="post" action="../helpers/claseRegistro.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <input type="text" id="id_clase" hidden="true">
                            <div class="form-group col-md-4">
                                <label for="fecha">Fecha</label>
                                <input type="text" class="form-control" id="fecha">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="duracion">Duración (H)</label>
                                <input type="text" class="form-control" id="duracion">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="curso">Curso</label>
                                <input type="text" class="form-control" id="curso">
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="tema">Tema tratado</label>
                            <input type="text" class="form-control" id="tema">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="adulM">Adulto mayor</label>
                                <input type="text" class="form-control" id="adulM">
                            </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="img">Evidencia: </label>
                            <input type="file" name="image" />
                            </div>
                        </div>


                        <input type="submit" name="submit" value="Registrar" class="btn btn-primary"/>
                    </form>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
    </body>


<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../controlador/loginController.php');
}
?>
<script src="../js/clase.js"></script>