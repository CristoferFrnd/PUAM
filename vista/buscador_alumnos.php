<?php
session_start();
if ($_SESSION['us_tipo'] == 1) {

    include_once 'layouts/header.php';
?>

    <title>Alumnos Registrados</title>
    <?php
    include_once 'layouts/nav.php';
    ?>
    <!-- modal editar alumno -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-editar-alumno">
                        <div class="form-row">
                            <input type="text" id="id_us" hidden="true">
                            <div class="form-group col-md-6">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required="true">
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="cedula">N. Cedula</label>
                                <input type="text" class="form-control" id="cedula" placeholder="Cedula" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required="true">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nombre">N. Usuario</label>
                                <input type="text" class="form-control" id="n_us" placeholder="Nombre de Usuario" required="true">
                            </div>
                        </div>

                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <label for="dir">Correo</label>
                                <input type="text" class="form-control" id="correo" placeholder="Correo" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tel">Telefono</label>
                                <input type="text" class="form-control" id="tel" placeholder="Telefono" required="true">
                            </div>
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

    <!-- modal editar alumno -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <input type="text" id="id_del_us" hidden="true">
                <div class="modal-header">
                    Eliminar Alumno
                </div>
                <div id="msg" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="eliminar-alumno btn btn-danger" data-dismiss="modal">Estoy de acuerdo</button>
                </div>
            </div>
        </div>
    </div>

    <body>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper container">
            <!-- Content Header (Page header) -->
            <br>
            <section>
                <div class="container-fluid">
                    <div class="card card-success animate__animated animate__bounceInRight">
                        <div class="card-header">
                            <div class="card-title">Buscar Alumnos</div>
                            <div class="input-group">
                                <input id="buscar-alumno" type="text" class="form-control float-left" placeholder="Ingrese cedula o apellido">
                                <div class="input-group-append">
                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tabla-socios" class="display table table-hover text-nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>N. Cedula</th>
                                        <th>Apellidos</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                    </tr>
                                </thead>
                                <tbody id="alumnos">
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
    <!-- /.content-wrapper -->
<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../index.php');
}
?>
<script src="../js/alumno.js"></script>