<?php
session_start();
if ($_SESSION['us_tipo'] == 1) {

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
                    <h3 style="padding: 20px;">LISTADO DE TODAS LAS CLASES</h3>
                    <div class="card-body">
                        <div class="container-btn-add">
                            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Search" aria-label="Search" id="search">
                            <i class="fa fa-search lupa" aria-hidden="true"></i>
                        </div>
                        <input type="hidden" id="rows" value="0">
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Participante</th>
                                    <th>Tutor</th>
                                    <th>Curso</th>
                                    <th>Tipo de Clase</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody id="clases">
                            </tbody>
                        </table>
                        <!-- <div class="datatable-pagination d-flex flex-row-reverse">
                            <div class="datatable-pagination-buttons align-items-end">
                                <button id="prev" data-mdb-ripple-color="dark" class="btn btn-link datatable-pagination-button datatable-pagination-left"><i class="fa fa-chevron-left"></i></button>
                                <button id="next" data-mdb-ripple-color="dark" class="btn btn-link datatable-pagination-button datatable-pagination-right"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div> -->
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

                    


                        <div class="form-group">
                            <label for="img">Evidencia</label>
                            <img class="img-fluid" style="width:100%" src="../img/reunion.jpg" alt="Eniun" id="img">
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
    </body>

<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../index.php');
}
?>
<script src="../js/clase.js"></script>