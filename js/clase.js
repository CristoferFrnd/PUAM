$(document).ready(function () {
    listar_clases();
    //datos_alumno();

    function listar_clases(consulta) {
        funcion = "listar";
        $.post('../controlador/claseController.php', { consulta, funcion }, (response) => {
            console.log(response);
            const CLASES = JSON.parse(response);
            let template = ``;
            CLASES.forEach(clase => {
                template += `
                    <tr >
                    <td>${clase.fecha_clase}</td>
                    <td>${clase.nombre_adMay}</td>
                    <td>${clase.tutor}</td>
                    <td>${clase.nombre_crs}</td>
                    <td><button type='button' class='editar-alumno btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Ver detalle</button></td>
                    
                </tr>
                    `;
            });
            $('#clases').html(template);
        });
    }

    
})