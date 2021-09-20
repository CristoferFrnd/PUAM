<?php
session_start();
if ($_SESSION['us_tipo'] == 1) {

    include_once 'layouts/header.php';
?>

    <title>Alumnos Registrados</title>
    <?php
    include_once 'layouts/nav.php';
    ?>
    <div class="content-wrapper container">
        <br>
        <section>
            <div class="container-fluid">
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="card-body">
                        <table id="tabla" class="display table table-hover text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Participante</th>
                                    <th>Tutor</th>
                                    <th>Curso</th>
                                    <th>Tipo de Clase</th>
                                </tr>
                            </thead>
                            <tbody id="clases">
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
                            <label for="adulM">Participante</label>
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
                        <img src="../img/reunion.jpg" class="img-fluid" alt="Eniun" id="img">
                    </div>
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
    header('Location: ../index.php');
}
?>
<script src="../js/clase.js"></script>