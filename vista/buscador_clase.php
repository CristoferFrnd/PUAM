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
                                        <th>N. Cedula</th>
                                        <th>Apellidos</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
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





    <body>
   
    </body>

<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../index.php');
}
?>
<script src="../js/clase.js"></script>
