
$(document).ready(function () {
    
    datos_alumno();
    listar_alumnos_curso();
    if ($('#us_tipo').val() == 3) {
        listar_alumnos();

    } else {
        listar_alumnos_fin();
    }
    listar_cursos();

    function listar_alumnos(consulta) {
        funcion = "listar";
        $.post('../controlador/alumnoController.php', { consulta, funcion }, (response) => {
            localStorage.setItem('alumnos', response);
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

    function listar_alumnos_fin() {
        funcion = "listarFin";
        $.post('../controlador/alumnoController.php', { funcion }, (response) => {
            const ALUMNOS = JSON.parse(response);
            let template = ``;
            $tablaFin = document.getElementById('tablaFin');
            if (ALUMNOS.length > 0) {
                $tablaFin.style.display = 'block';
                ALUMNOS.forEach(alumno => {
                    template += `
                    <tr us_id="${alumno.id_usuario}" us_nombre="${alumno.nombre}" us_horasR="${alumno.horasR}" class="bg-success">
                        <td>${alumno.id_usuario}</td>
                        <td>${alumno.nombre}</td>
                        <td>${alumno.correo}</td>
                        <td>${alumno.tel}</td>
                        <td>${alumno.horasR}</td>
                        <td>${alumno.curso}</td>
                        <td><button type='button' class='genCert btn btn-danger'><i class="fas fa-file-pdf"></i></button></td>
                    </tr>
                    `;
                });
                $('#alumnosFin').html(template);
            }
            else {
                $tablaFin.style.display = 'none';
            }

            listar_alumnos();
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
            if (response == 'add') {
                alert("Tutor Agregado con Éxito");
                $.post('../helpers/recuperar.php', { funcion, correo }, (response) => {

                });

            } else {
                alert("Error al Agregar Tutor");
            }

            $('#form-registar-alumno').trigger('reset');

        });

        listar_alumnos();
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

    $(document).on('click', '.genCert', (e) => {
        funcion = 'usuario_estado';
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        const ID = $(ELEMENTO).attr('us_id');
        const NOMBRE = $(ELEMENTO).attr('us_nombre');
        const HORASR = $(ELEMENTO).attr('horasR');

        $.post('../controlador/alumnoController.php', { funcion, ID }, (response) => {
            console.log(response);
            listar_alumnos_fin();
        })

        funcion = 'certificado';
        $.post('../helpers/pdfCert.php', { funcion, ID, NOMBRE, HORASR }, (response) => {
            const NAME = JSON.parse(response);
            var ventana = window.open(NAME, '_blank');
            var loop = setInterval(function () {
                if (ventana.closed) {
                    clearInterval(loop);
                    funcion = 'elimDoc';
                    $.post('../helpers/pdfRepor.php', { funcion, NAME }, (response) => {
                    });
                }
            }, 1000);
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

    $(document).on('click', '#reporteG', (e) => {
        funcion = 'reporFG';
        datos = localStorage.getItem('alumnos');
        $.post('../helpers/pdfRepor.php', { funcion, datos }, (response) => {
            const NAME = JSON.parse(response);
            var ventana = window.open(NAME, '_blank');
            var loop = setInterval(function () {
                if (ventana.closed) {
                    clearInterval(loop);
                    funcion = 'elimDoc';
                    $.post('../helpers/pdfRepor.php', { funcion, NAME }, (response) => {
                    });
                }
            }, 1000);
        });
        e.preventDefault();
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

    function listar_alumnos_curso() {
        funcion = "buscar_us_crs";
        id = 5;
        $.post('../controlador/alumnoController.php', { id, funcion }, (response) => {
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
                        <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class="fas fa-edit"></i></button></td>
                    </tr>
                    `;
            });
            $('#alumnosCrs').html(template);
        });
    }



})