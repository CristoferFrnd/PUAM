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
    <div class="container pt-4">
        <div class="card">
            <div class="card-body">
                <div class="pb-5">
                    <h1 class="text-center">Registrar Nuevo Alumno</h1>
                </div>
                <form id="form-registrar-alumno">
                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" required="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cedula">N. Cedula</label>
                            <input type="text" class="form-control" id="cedula" placeholder="Cedula" required="true">
                        </div>

                        <div class="col-md-2"></div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" id="correo" placeholder="Correo" required="true">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="horasR">Horas Realizadas</label>
                            <input type="number" class="form-control" id="horasR" placeholder="Horas Realizadas" required="true">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="horasR">Curso</label>
                            <select class="form-select" aria-label="Default select example" id="cursos">
                                <option selected value="1">Informática</option>
                            </select>

                        </div>

                        <div class="col-md-2"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include_once 'layouts/footer.php';
?>

<script src="../js/alumno.js"></script>