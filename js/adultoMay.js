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
                                        
                    <td><button type='button' class='estado_adulM btn ${color}'>${estado}</button></td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class="fas fa-edit"></i></button></td>
                    </tr>
                    `;

            });

            $('#adultoMay_tab').html(template);
        });
    }

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

    $(document).on('click', '.estado_adulM', (e) => {
        funcion = 'actualizar-estado';
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        const Btn = $(this)[0].activeElement;
        const estado = $(ELEMENTO).attr('data-estado');
        console.log(estado);
        const id = $(ELEMENTO).attr('data-id');
        console.log(id);

        $.post('../controlador/adultoMayController.php', { funcion, id , estado}, (response) => {
           
            if(estado == '1'){
                $(ELEMENTO).attr('data-estado', 0);
                $(Btn).removeClass('btn-success');
                $(Btn).addClass('btn-danger');
                $(Btn).text('Inactivo');
            }else{
                $(ELEMENTO).attr('data-estado', 1);
                $(Btn).removeClass('btn-danger');
                $(Btn).addClass('btn-success');
                $(Btn).text('Activo');
            }

           
        });

    });




})