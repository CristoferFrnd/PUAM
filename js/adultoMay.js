$(document).ready(function () {
    listar_adultoMays();


    function listar_adultoMays(consulta) {
        funcion = "listar";
        $.post('../controlador/adultoMayController.php', {consulta, funcion }, (response) => {
            const ADULTOMAYS = JSON.parse(response);
            let template = ``;
            ADULTOMAYS.forEach(adultomay => {
                template += `
                    <tr>
                    <td>${adultomay.id_adMay}</td>
                    <td>${adultomay.nombreAdMay}</td>
                    <td>${adultomay.telefonoC_AdMay}</td>
                    <td>${adultomay.celular_AdMay}</td>
                    <td>${adultomay.correoE_AdMay}</td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>
                    <td><button class='adv btn btn-danger' data-toggle='modal' data-target='#confirm-delete'>Eliminar</i></button></td>
                </tr>
                    `;
                
            });
            
            $('#adultoMay_tab').html(template);
        });
    }

    

   
})