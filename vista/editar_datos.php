<?php
session_start();
include_once 'layouts/header.php';
?>


    <title>Datos Usuario</title>
<?php
    if ($_SESSION['us_tipo'] == 1) {
        include_once 'layouts/nav.php';
        ;
    } else {
        include_once 'layouts/nav_al.php';

    }
    ?>

    <body>
        <div class="content-wrapper container top">
            <div class="card">
                <div class="card-body">
                    <div class="pb-5">
                        <h1 class="text-center">Editar Datos</h1>
                    </div>

                    <form id="form-editar-alumno">
                        <input type="text" id="id_us" hidden="true" value="<?php echo $_SESSION['usuario']; ?>">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="apellidos">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $_SESSION['nombre_us']; ?>" required="true" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cedulaE">N. Cédula</label>
                                <input type="text" class="form-control" id="cedulaE" placeholder="Cedula" required="true" disabled>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="correo">Correo</label>
                                <input type="text" class="form-control" id="correoE" placeholder="Correo" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tel">Telefono</label>
                                <input type="text" class="form-control" id="telE" placeholder="Telefono" value="<?php echo $_SESSION['correo']; ?>" required="true" disabled >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required="true">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirmar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
        </div>
    </body>

<?php
    include_once 'layouts/footer.php';
?>

<script src="../js/alumno.js"></script>