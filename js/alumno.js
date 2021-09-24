$(document).ready(function () {
    listar_alumnos();
    listar_cursos();
    datos_alumno();

    function listar_alumnos(consulta) {
        funcion = "listar";
        $.post('../controlador/alumnoController.php', { consulta, funcion }, (response) => {

            const ALUMNOS = JSON.parse(response);
            let template = ``;
            ALUMNOS.forEach(alumno => {
                template += `
                    <tr us_id="${alumno.id_usuario}">
                        <td>${alumno.id_usuario}</td>
                        <td>${alumno.nombre}</td>
                        <td>${alumno.correo}</td>
                        <td>${alumno.tel}</td>
                        <td>${alumno.horasR}</td>
                        <td>${alumno.curso}</td>
                        <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class="fas fa-edit"></i></button></td>
                    </tr>
                    `;
            });
            $('#alumnos').html(template);
        });
    }

    $(document).on('keyup', '#search', function () {
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
        let contrasena = '123456';
        let correo = $('#correo').val();
        let telefono = $('#telefono').val();
        let horasR = $('#horasR').val();
        let curso = $('#cursos').val();

        funcion = 'registrar';
        $.post('../controlador/alumnoController.php', { funcion, nombre, contrasena, cedula, correo, telefono, horasR, curso }, (response) => {
            if(response == 'add'){
                alert("Tutor Agregado con Éxito");
            }else{
                alert("Error al Agregar Tutor");
            }
            $('#form-registar-alumno').trigger('reset');
            location.href = '../vista/registrar_alumno.php'
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
            console.log(response);
            $('#nombreE').val(ALUMNO.nombre);
            $('#apellidosE').val(ALUMNO.apellidos);
            $('#correoE').val(ALUMNO.correo);
            $('#contrasenaE').val(ALUMNO.contrasena);
            $('#telE').val(ALUMNO.tel);
            $('#cedulaE').val(ALUMNO.id_usuario);
            $('#cursoE').val(ALUMNO.curso);
            $('#horasRE').val(ALUMNO.horasR);
        });

    });

    function datos_alumno() {
        funcion = "buscar_us_id";
        ID = $('#id_us').val();
        $.post('../controlador/alumnoController.php', { ID, funcion }, (response) => {
            const ALUMNO = JSON.parse(response);
            $('#nombre').val(ALUMNO.nombre);
            $('#correo').val(ALUMNO.correo);
            $('#contrasena').val(ALUMNO.pass);
            $('#tel').val(ALUMNO.tel);
            $('#cedula').val(ALUMNO.id_usuario);
            $('#id_us').val(ID);
        });
    }


    $(document).on('click', '.eliminar-alumno', (e) => {
        funcion = 'eliminar';
        const ID = $('#id_del_us').val();
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

    function listar_cursos() {
        funcion = "listar";
        $.post('../controlador/cursoController.php', { funcion }, (response) => {
            const CURSOS = JSON.parse(response);
            let template = ``;
            CURSOS.forEach(curso => {
                template += `
                        <option value="${curso.id_crs}">${curso.nombre_crs}</option>
                    `;
            });
            $('#cursos').html(template);
        });
    }
})