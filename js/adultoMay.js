$(document).ready(function () {
    listar_adultoMays();


    function listar_adultoMays(consulta) {
        funcion = "listar";
        $.post('../controlador/adultoMayController.php', { consulta, funcion }, (response) => {
            console.log(response);
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                template += `
                    <tr>
                    <td>${adultomay.id_adulMay}</td>
                    <td>${adultomay.nombre}</td>
                    <td>${adultomay.telefono}</td>
                    <td>${adultomay.celular}</td>
                    <td>${adultomay.correo}</td>
                    <td>
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Activo</label>
                    </div>
                    </td>
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




})