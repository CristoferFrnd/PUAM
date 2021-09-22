$(document).ready(function () {
    listar_adultoMays();


    function listar_adultoMays(consulta) {
        funcion = "listar";
        $.post('../controlador/adultoMayController.php', { consulta, funcion }, (response) => {
                            
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                let estado = 'Inactivo';
                let color= 'btn-danger';
                if(adultomay.estado == '1'){
                    estado='Activo';
                    color= 'btn-success';
                }
                console.log(estado)
                template += `
                    <tr data-estado="${adultomay.estado}" data-id="${adultomay.id_adulMay}">
                    <td>${adultomay.id_adulMay}</td>
                    <td>${adultomay.nombre}</td>
                    <td>${adultomay.telefono}</td>
                    <td>${adultomay.celular}</td>
                    <td>${adultomay.correo}</td>
                                        
                    <td><button type='button' class='conf_estado btn ${color}' data-toggle='modal' data-target='#estadoM'>${estado}</button></td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#modalEditar'><i class="fas fa-edit"></i></button></td>
                    </tr>
                    `;

            });

            $('#adultoMay_tab').html(template);
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
            alert(response);
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
        $.post('../controlador/adultoMayController.php', { funcion, id , estado}, (response) => {
            if(estado == '1'){
                $($ELEMENTO).attr('data-estado', 0);
                $($Btn).removeClass('btn-success');
                $($Btn).addClass('btn-danger');
                $($Btn).text('Inactivo');
            }else{
                $($ELEMENTO).attr('data-estado', 1);
                $($Btn).removeClass('btn-danger');
                $($Btn).addClass('btn-success');
                $($Btn).text('Activo');
            }

        
        });

    });




})