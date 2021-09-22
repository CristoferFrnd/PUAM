<?php
session_start();
include_once 'layouts/header.php';
?>


<title>Ingresar Nuevos Alumnos</title>
<?php
if ($_SESSION['us_tipo'] == 1) {
    include_once 'layouts/nav.php';
} else {
    echo '<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link type="text/css" href="../css/login.css" rel="stylesheet">';
}
?>

<body>


    <!-- modal editar Adulto Mayor -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Participante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-registrar-am">
                        <div class="form-row">

                            <div class=col-md-2></div>
                            <div class="form-group col-md-8">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required="true">
                            </div>
                            <div class=col-md-2></div>

                        </div>

                        <div class="form-row">
                            <div class=col-md-2></div>

                            <div class="form-group col-md-4">
                                <label for="cedula">N. Cedula</label>
                                <input type="text" class="form-control" id="cedula" placeholder="Cedula" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" placeholder="celular" required="true">
                            </div>
                            <div class=col-md-2></div>

                        </div>

                        <div class="form-row">

                            <div class=col-md-2></div>

                            <div class="form-group col-md-4">
                                <label for="dir">Correo</label>
                                <input type="text" class="form-control" id="correo" placeholder="Correo" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Telefono" required="true">
                            </div>
                            <div class=col-md-2></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                </form>
            </div>
        </div>
    </div>


    <!-- TABLITA-->
    <div class="content-wrapper container">
        <br>
        <section>
            <div class="container-fluid">
                <div class="container-btn-add">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i></button>
                </div>
                <div class="card card-success animate__animated animate__bounceInRight">
                    <div class="card-body">
                        <table id="tabla" class="display table table-hover text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N. Cedula</th>
                                    <th>Apellidos</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody id="adultoMay_tab">
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