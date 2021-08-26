$(document).ready(function () {
    listar_alumnos();
    datos_alumno();

    function listar_alumnos(consulta) {
        funcion = "listar";
        $.post('../controlador/alumnoController.php', { consulta, funcion }, (response) => {
            const ALUMNOS = JSON.parse(response);
            let template = ``;
            ALUMNOS.forEach(alumno => {
                template += `
                    <tr us_id=${alumno.id_usuario} us_ap=${alumno.apellidos}>
                    <td>${alumno.n_cedula}</td>
                    <td>${alumno.apellidos}</td>
                    <td>${alumno.nombre}</td>
                    <td>${alumno.correo}</td>
                    <td>${alumno.telefono}</td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>
                    <td><button class='adv btn btn-danger' data-toggle='modal' data-target='#confirm-delete'>Eliminar</i></button></td>
                </tr>
                    `;
            });
            $('#alumnos').html(template);
        });
    }

    $(document).on('keyup', '#buscar-alumno', function () {
        let valor = $(this).val();
        if (valor != '') {
            listar_alumnos(valor);
        } else {
            listar_alumnos();
        }
    })

    $('#form-registrar-alumno').submit(e => {
        let nombre = $('#nombre').val();
        let cedula = $('#cedula').val();
        let apellidos = $('#apellidos').val();
        let contrasena = $('#contrasena').val();
        let correo = $('#correo').val();
        let telefono = $('#tel').val();
        let n_usuario = $('#n_us').val();
        funcion = 'registrar';
        $.post('../controlador/alumnoController.php', { funcion, nombre, apellidos, n_usuario, contrasena, cedula, correo, telefono }, (response) => {
            alert(response);
            $('#form-alumno-socio').trigger('reset');
            location.href = '../vista/buscador_alumnos.php'

        });

        e.preventDefault();
    });


    $('#form-editar-alumno').submit(e => {
        let nombre = $('#nombre').val();
        let cedula = $('#cedula').val();
        let apellidos = $('#apellidos').val();
        let contrasena = $('#contrasena').val();
        let correo = $('#correo').val();
        let telefono = $('#tel').val();
        let n_usuario = $('#n_us').val();
        let id_us = $('#id_us').val();
        funcion = 'editar';
        $.post('../controlador/alumnoController.php', { funcion, id_us, nombre, apellidos, n_usuario, contrasena, cedula, correo, telefono }, (response) => {
            $('#form-editar-alumno').trigger('reset');
            listar_alumnos();
            datos_alumno();
            $('#exampleModal').modal('hide');
        });

        e.preventDefault();
    });

    $(document).on('click', '.editar-alumno', (e) => {
        funcion = 'buscar_us_id';
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        const ID = $(ELEMENTO).attr('us_id');
        $.post('../controlador/alumnoController.php', { funcion, ID }, (response) => {
            const ALUMNO = JSON.parse(response);
            $('#nombre').val(ALUMNO.nombre);
            $('#apellidos').val(ALUMNO.apellidos);
            $('#correo').val(ALUMNO.correo);
            $('#contrasena').val(ALUMNO.contrasena);
            $('#tel').val(ALUMNO.telefono);
            $('#cedula').val(ALUMNO.n_cedula);
            $('#n_us').val(ALUMNO.n_usuario);
            $('#id_us').val(ID);
        });

    });

    function datos_alumno() {
        funcion = "buscar_us_id";
        ID = $('#id_us').val();
        $.post('../controlador/alumnoController.php', { ID, funcion }, (response) => {
            const ALUMNO = JSON.parse(response);
            $('#nombre').val(ALUMNO.nombre);
            $('#apellidos').val(ALUMNO.apellidos);
            $('#correo').val(ALUMNO.correo);
            $('#contrasena').val(ALUMNO.contrasena);
            $('#tel').val(ALUMNO.telefono);
            $('#cedula').val(ALUMNO.n_cedula);
            $('#n_us').val(ALUMNO.n_usuario);
            $('#id_us').val(ID);
        });
    }


    $(document).on('click', '.eliminar-alumno', (e) => {
        funcion = 'eliminar';
        const ID = $('#id_del_us').val();
        console.log(ID);
        $.post('../controlador/alumnoController.php', { funcion, ID }, (response) => {
            console.log(response);
            listar_alumnos();
        });
        e.preventDefault();
    });

    $(document).on('click', '.adv', (e) => {
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        alumno = $(ELEMENTO).attr('us_ap');
        const ID = $(ELEMENTO).attr('us_id');
        $('#id_del_us').val(ID);
        $('#msg').html(`<p>Esta seguro de eliminar al alumno/a ${alumno}? Esta acción no se puede revertir.</p>`)
    });

})