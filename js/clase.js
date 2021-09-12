$(document).ready(function () {
    listar_clases();
    //datos_alumno();

    function listar_clases(consulta) {
        funcion = "listar";
        $.post('../controlador/claseController.php', { consulta, funcion }, (response) => {
            const CLASES = JSON.parse(response);
            let template = ``;
            CLASES.forEach(clase => {
                template += `
                    <tr >
                    <td>${clase.fecha_clase}</td>
                    <td>${clase.adultoMay_id_adMay}</td>
                    <td>${clase.tutores_id_tutor}</td>
                    <td>${clase.cursos_id_crs}</td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>
                    <td><button class='adv btn btn-danger' data-toggle='modal' data-target='#confirm-delete'>Eliminar</i></button></td>
                </tr>
                    `;
            });
            $('#clases').html(template);
        });
    }

    
})