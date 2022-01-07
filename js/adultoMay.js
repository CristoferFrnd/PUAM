$(document).ready(function () {
    if ($('#us_tipo').val() == 2) {
        listar_adultoMays_al();

    } else {
        if ($('#us_tipo').val() == 1) {
            listar_adultoMaysAdmin();
        }
        else {
            listar_adultoMays();
            listar_adultoMaysTemp();
            listar_adultoMaysCRS();
        }
    }



    function listar_adultoMays(consulta) {
        funcion = "listar";
        $('#tPart').DataTable({
            "ajax": {
                "url": "../controlador/adultoMayController.php",
                "method": "POST",
                "data": {
                    funcion: funcion,
                }
            },
            "columns": [
                { "data": "id_admay" },
                { "data": "nombre_admay" },
                { "data": "celular_admay" },
                { "data": "telefonoc_admay" },
                { "data": "correoe_admay" },
                { "defaultContent": `<button type='button' class='btn' disabled></button>` }
            ],
            "createdRow": function (row, data, index) {
                let button = $(row)[0].children[5].children[0];
                if (data.activ_admay == '1') {
                    button.textContent = 'Activo';
                    button.className = 'btn btn-success';

                }
                else {
                    button.textContent = 'Inactivo';
                    button.className = 'btn btn-danger';

                }

            }
        });
    }

    function listar_adultoMaysAdmin() {
        funcion = "listar";
        $('#tPartAdmin').DataTable({
            "ajax": {
                "url": "../controlador/adultoMayController.php",
                "method": "POST",
                "data": {
                    funcion: funcion,
                }
            },
            "columns": [
                { "data": "id_admay" },
                { "data": "nombre_admay" },
                { "data": "celular_admay" },
                { "data": "telefonoc_admay" },
                { "data": "correoe_admay" },
                { "defaultContent": `<button type='button' class='btn' data-toggle='modal' data-target='#estadoM'></button>` },
                { "defaultContent": `<button type='button' class='lis_cursos btn btn-primary' data-toggle='modal' data-target='#verCrs'><i class="fas fa-bars"></i></button>` },
                { "defaultContent": `<button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#modalEditar'><i class="fas fa-edit"></i></button>` }
            ],
            "createdRow": function (row, data, index) {
                $(row).attr('data-id', data.id_admay);
                $(row).attr('data-estado', data.activ_admay);
                let button = $(row)[0].children[5].children[0];
                if (data.activ_admay == '1') {
                    button.textContent = 'Activo';
                    button.className = 'btn btn-success conf_estado';

                }
                else {
                    button.textContent = 'Inactivo';
                    button.className = 'btn btn-danger conf_estado';
                }

            }
        });
    }

    function listar_adultoMaysCRS(consulta) {
        funcion = "listar";
        $.post('../controlador/adultoMayController.php', { consulta, funcion }, (response) => {
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                template += `
                    <tr data-estado="${adultomay.estado}" data-id="${adultomay.id_adulMay}">
                    <td>${adultomay.id_adulMay}</td>
                    <td>${adultomay.nombre}</td>
                    <td>${adultomay.telefono}</td>
                    <td>${adultomay.celular}</td>
                    <td>${adultomay.correo}</td>              
                    </tr>
                    `;
            });
            $('#adultoMay_tabCrs').html(template);
        });
    }

    function listar_adultoMays_al() {
        const ID = $('#us_id').val();
        funcion = "buscar_am_al";
        $('#alParti').DataTable({
            "ajax": {
                "url": "../controlador/claseController.php",
                "method": "POST",
                "data": {
                    funcion: funcion,
                    ID: ID,
                }
            },
            "columns": [
                { "data": "id_admay" },
                { "data": "nombre_admay" },
                { "data": "celular_admay" },
                { "data": "telefonoc_admay" },
                { "data": "correoe_admay" },
                { "defaultContent": `<button type='button' class='btn' disabled></button>` }
            ],
            "createdRow": function (row, data, index) {
                let button = $(row)[0].children[5].children[0];
                if (data.activ_admay == '1') {
                    button.textContent = 'Activo';
                    button.className = 'btn btn-success';

                }
                else {
                    button.textContent = 'Inactivo';
                    button.className = 'btn btn-danger';

                }

            }
        });
    }

    function listar_adultoMaysTemp() {
        funcion = "listar_crs";
        $.post('../controlador/tempController.php', { funcion }, (response) => {
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            if (ADULTOMAYS.length > 0) {
                ADULTOMAYS.forEach(adultomay => {
                    template += `
                    <tr data-id="${adultomay.id_adulMay}" data-id-curso="${adultomay.id_curso}">
                    <td>${adultomay.id_adulMay}</td>
                    <td>${adultomay.nombre}</td>             
                    <td><select class="form-control" id="s${adultomay.id_adulMay}"></button></td>
                    <td><button class="form-control btn-primary btn-listar" id="b${adultomay.id_adulMay}">Listar</button></td>
                    <td><button class="form-control btn-primary btn-matricular" id="b${adultomay.id_adulMay}">Matricular</button></td>
                    </tr>
                    `;
                });
            }
            else {
                template += `<tr><td>Sin participantes para matricular</td></tr>`
            }
            $('#lista_estudiantes').html(template);
        });

    }

    $(document).on('click', '.conf_estado', (e) => {
        $ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        $Btn = $(this)[0].activeElement;
        estado = $($ELEMENTO).attr('data-estado');
        id = $($ELEMENTO).attr('data-id');
    });

    $(document).on('click', '.conf_cambio', (e) => {
        funcion = 'actualizar-estado';
        $.post('../controlador/adultoMayController.php', { funcion, id, estado }, (response) => {
            if (estado == '1') {
                $($ELEMENTO).attr('data-estado', 0);
                $($Btn).removeClass('btn-success');
                $($Btn).addClass('btn-danger');
                $($Btn).text('Inactivo');
            } else {
                $($ELEMENTO).attr('data-estado', 1);
                $($Btn).removeClass('btn-danger');
                $($Btn).addClass('btn-success');
                $($Btn).text('Activo');
            }


        });

    });

    $(document).on('click', '.lis_cursos', (e) => {
        let template = ``;
        $ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        $Btn = $(this)[0].activeElement;
        id = $($ELEMENTO).attr('data-id');

        funcion = 'buscar_crs';
        TABLA = document.getElementById('lista_Crs');
        $.post('../controlador/adultoMayController.php', { funcion, id }, (response) => {
            const CURSOS = JSON.parse(response);
            let template = ``;
            CURSOS.forEach(curso => {
                TABLA.innerHTML += `
                <tr>
                    <td>${curso.nombreC}</td>
                    <td>${curso.nombreP}</td>
                    <td>${curso.fechaI}</td>
                </tr>
                `;
            })
        });

        $('#lista_Crs').html(template);

    });

    $(document).on('click', '.btn-getId', (e) => {
        $ELEMENTOMAT = $(this)[0].activeElement.parentElement.parentElement;
        $BtnMat = $(this)[0].activeElement;
        estadoMat = $($ELEMENTOMAT).attr('data-estado');
        adulMay = $($ELEMENTOMAT).attr('data-id');
        listar_cursos_no_mat(adulMay);
    });

    $(document).on('click', '.btn-matricular', (e) => {
        $ELEMENTOMAT = $(this)[0].activeElement.parentElement.parentElement;
        $BtnMat = $(this)[0].activeElement;
        adulMay = $($ELEMENTOMAT).attr('data-id');
        id_curso = $($ELEMENTOMAT).attr('data-id-curso');
        elemTut = document.getElementById("s" + adulMay)
        tutor = elemTut.value;
        fecha = FechaHoy();
        estado = 1;

        funcion = 'registrar';
        $.post('../controlador/adultoMayhasCrsController.php', { funcion, tutor, estado, fecha, adulMay }, (response) => {
            if (response == 'add') {
                alert("Participante matriculado con Éxito");

            } else {
                alert("No se pudo matricular al participante");
            }
        });

        funcion = 'eliminar';
        $.post('../controlador/tempController.php', { funcion, adulMay, id_curso }, (response) => {
        });

        listar_adultoMaysTemp();
    });


    $(document).on('click', '.btn-listar', (e) => {
        llenar_tutores();
    });

    function listar_cursos_no_mat(id) {
        funcion = "listar_no_mat";
        $.post('../controlador/cursoController.php', { id, funcion }, (response) => {
            const CURSOS = JSON.parse(response);
            let template = ``;
            CURSOS.forEach(curso => {
                template += `
                    <tr data-id=${curso.id_crs}>
                        <td><input type="checkbox" id="check${curso.id_crs}"/></td>
                        <td>${curso.nombre_crs}</td>
                        <td>
                        <select class="form-select form-select-m form-control" id="${curso.id_crs}"/>
                        </td>
                    </tr>
                    `;
            });
            $('#matr_Crs').html(template);

        });
    }

    $(document).on('click', '#ingresar', (e) => {
        let cedula = $('#cedula').val();
        let nombre = $('#nombre').val();
        let telefono = $('#telefono').val();
        let celular = $('#celular').val();
        let correo = $('#correo').val();

        funcion = 'registrar';

        $.post('../controlador/adultoMayController.php', { funcion, cedula, nombre, telefono, celular, correo }, (response) => {
            alert("Participante Registrado con Éxito");
            //$('#form-registrar-am').trigger('reset');
            //location.href = '../vista/registrar_am.php'

        });

        let lista = document.querySelectorAll('input[type="checkbox"]');
        lista.forEach(selector => {
            if (selector.checked) {
                funcion = 'registrar';
                id_curso = selector.getAttribute("id").substr(5);
                console.log(cedula);
                console.log(id_curso);
                $.post('../controlador/tempController.php', { funcion, cedula, id_curso }, (response) => {
                    console.log(response);
                    alert("Participante redirigido a los cursos seleccionados");

                });
            }
        })

        $('#form-registrar-am').trigger('reset');
        //location.href = '../vista/registrar_am.php'
    });

})
function llenar_tutores() {
    let listaT = document.querySelectorAll('select');
    funcion = 'buscar_crs_est';
    $.post('../controlador/alumnoController.php', { funcion }, (response) => {

        const ALUMNOS = JSON.parse(response);
        listaT.forEach(combo => {
            id = combo.getAttribute("id");

            ALUMNOS.forEach(alumno => {
                let option = document.createElement('option');
                option.value = alumno.id_usuario;
                option.text = alumno.nombre;
                combo.appendChild(option);
            });
        });

    });
}
window.addEventListener('load', llenar_tutores());
function FechaHoy() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    return yyyy + '-' + mm + '-' + dd;
}

