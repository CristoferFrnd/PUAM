$(document).ready(function () {
    console.log($('#us_tipo').val() == 2);
    if ($('#us_tipo').val() == 2) {
        console.log("ingreso");
        listar_adultoMays_al();
    }

    listar_adultoMays();


    function listar_adultoMays(consulta) {
        funcion = "listar";
        $.post('../controlador/adultoMayController.php', { consulta, funcion }, (response) => {
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                let estado = 'Inactivo';
                let color = 'btn-danger';
                if (adultomay.estado == '1') {
                    estado = 'Activo';
                    color = 'btn-success';
                }
                template += `
                    <tr data-estado="${adultomay.estado}" data-id="${adultomay.id_adulMay}">
                    <td>${adultomay.id_adulMay}</td>
                    <td>${adultomay.nombre}</td>
                    <td>${adultomay.telefono}</td>
                    <td>${adultomay.celular}</td>
                    <td>${adultomay.correo}</td>              
                    <td><button type='button' class='conf_estado btn ${color}' data-toggle='modal' data-target='#estadoM'>${estado}</button></td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#modalEditar'><i class="fas fa-edit"></i></button></td>
                    <td><button type='button' class='lis_cursos btn btn-primary' data-toggle='modal' data-target='#verCrs'><i class="fas fa-bars"></i></button></td>
                    <td><button type='button' class='btn btn-primary btn-getId' data-toggle='modal' data-target='#matrCrs'><i class="fas fa-user-plus"></i></button></td>
                    </tr>
                    `;
            });

            $('#adultoMay_tab').html(template);
        });
    }

    function listar_adultoMays_al(consulta) {
        const ID = $('#us_id').val();
        funcion = "buscar_am_al";
        $.post('../controlador/claseController.php', { ID, consulta, funcion }, (response) => {
            console.log(response);
            const ADULTOMAYS = JSON.parse(response);
            if (ADULTOMAYS.length == 0) {
                alert("No Tienes Alumnos Registrados para tu Curso")
            }
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                let estado = 'Inactivo';
                let color = 'btn-danger';
                if (adultomay.activ_admay == '1') {
                    estado = 'Activo';
                    color = 'btn-success';
                }
                template += `
                    <tr data-estado="${adultomay.estado}" data-id="${adultomay.id_adMay}">
                    <td>${adultomay.id_adMay}</td>
                    <td>${adultomay.nombre_admay}</td>
                    <td>${adultomay.telefonoc_admay}</td>
                    <td>${adultomay.celular_admay}</td>
                    <td>${adultomay.correoe_admay}</td>              
                    <td><button type='button' class='conf_estado btn ${color}' data-toggle='modal' data-target='#estadoM' disabled>${estado}</button></td>
                    </tr>
                    `;
            });

            $('#adultoMay_tab_al').html(template);
        });
    }


    $(document).on('keyup', '#search1', function () {
        console.log('prueba')
        let valor = $(this).val();
        if (valor != '') {
            listar_adultoMays(valor);
        } else {
            listar_adultoMays();
        }
    })

    $('#form-registrar-am').submit(e => {
        let cedula = $('#cedula').val();
        let nombre = $('#nombre').val();
        let telefono = $('#telefono').val();
        let celular = $('#celular').val();
        let correo = $('#correo').val();


        funcion = 'registrar';
        $.post('../controlador/adultoMayController.php', { funcion, cedula, nombre, telefono, celular, correo }, (response) => {
            alert("Participante Registrado con Éxito");
            $('#form-registrar-am').trigger('reset');
            location.href = '../vista/registrar_am.php'

        });

        e.preventDefault();
    });

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
            console.log(response);
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

            // CURSOS.forEach(curso => {
            //     console.log(curso)
            //     template += `
            //         <tr>
            //         <td>${curso.nombreC}</td>
            //         <td>${curso.nombreP}</td>
            //         <td>${curso.fechaI}</td>
            //         </tr>
            //         `;
            // });
        });

        $('#lista_Crs').html(template);

    });

    $(document).on('click', '.btn-getId', (e) => {
        $ELEMENTOMAT = $(this)[0].activeElement.parentElement.parentElement;
        $BtnMat = $(this)[0].activeElement;
        estadoMat = $($ELEMENTOMAT).attr('data-estado');
        adulMay = $($ELEMENTOMAT).attr('data-id');

    });

    $(document).on('click', '.btn-aux', (e) => {


        let lista = document.querySelectorAll('input[type="checkbox"]');
        lista.forEach(selector => {
            if (selector.checked) {
                funcion = 'registrar';
                curso = selector.getAttribute("id").substr(5);
                tutor = document.getElementById(curso).value;
                estado = 1;
                fecha = FechaHoy();
                $.post('../controlador/adultoMayhasCrsController.php', { funcion, tutor, estado, fecha, adulMay }, (response) => {
                    alert("Participante matriculado con éxito");

                });
            }
        })


    });

})

function FechaHoy() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    return yyyy + '-' + mm + '-' + dd;
}

