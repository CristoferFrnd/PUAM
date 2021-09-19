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
        <div class="container p-5">
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
                                <label for="cedula">N. Cedula</label>
                                <input type="text" class="form-control" id="cedula" placeholder="Cedula" required="true" disabled>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dir">Correo</label>
                                <input type="text" class="form-control" id="correo" placeholder="Correo" value="<?php echo $_SESSION['correo']; ?>" required="true" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tel">Telefono</label>
                                <input type="text" class="form-control" id="tel" placeholder="Telefono" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required="true">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmar Cambios</button>
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