<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || ($_SESSION['us_tipo'] == 2)) {

    include_once 'layouts/header.php';
?>


    <title>Editar Alumnos</title>
    <?php
    include_once 'layouts/nav_al.php';
    ?>

    <body>
        <div class="container p-5">
            <div class="pb-5">
                <h1 class="text-center">Editar Datos</h1>
            </div>
            <form id="form-editar-alumno">
                <div class="form-row">
                    <input type="text" id="id_us" hidden="true" value="<?php echo $_SESSION['usuario']; ?>">
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
                <button type="submit" class="btn btn-primary">Confirmar Cambios</button>
            </form>
        </div>
    </body>

<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../index.php');
}
?>

<script src="../js/alumno.js"></script>