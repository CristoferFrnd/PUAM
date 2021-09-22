$(document).ready(function () {
    if ($('#us_tipo').val() == 2) {
        listar_clases_al($('#us_id').val());
    } else {
        listar_clases();
    }
    //datos_alumno();

    function listar_clases(consulta) {
        funcion = "listar";
        $.post('../controlador/claseController.php', { consulta, funcion }, (response) => {

            const CLASES = JSON.parse(response);
            let template = ``;
            CLASES.forEach(clase => {
                template += `
                    <tr data-id="${clase.id_clase}">
                    <td>${clase.fecha_clase}</td>
                    <td>${clase.nombre_adMay}</td>
                    <td>${clase.tutor}</td>
                    <td>${clase.nombre_crs}</td>
                    <td>${clase.descripcion_tipoClase}</td>
                    <td><button class='verdetalle btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Ver detalle</button></td>
                </tr>
                    `;
            });
            $('#clases').html(template);
        });
    }

    function listar_clases_al(id) {
        funcion = "buscar_clase_alumno";
        $.post('../controlador/claseController.php', { id, funcion }, (response) => {
            console.log(response);
            const CLASES = JSON.parse(response);
            let template = ``;
            CLASES.forEach(clase => {
                template += `
                <tr data-id="${clase.id_clase}>
                    <td>${clase.fecha_clase}</td>
                    <td>${clase.nombre_adMay}</td>
                    <td>${clase.nombre_crs}</td>
                    <td>${clase.descripcion_tipoClase}</td>
                    <td><button class='verdetalle btn btn-primary' data-toggle='modal' data-target='#modalDetalle'>Ver detalle</button></td>
                </tr>
                    `;
            });
            $('#clases_alumno').html(template);
        });
    }

    $(document).on('keyup', '#search', function () {
        console.log('prueba')
        let valor = $(this).val();
        if (valor != '') {
            listar_clases(valor);
        } else {
            listar_clases();
        }
    })

    $(document).on('click', '.verdetalle', (e) => {
        funcion = 'buscar_id';
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        const ID = $(ELEMENTO).attr('data-id');
        
        $.post('../controlador/claseController.php', { funcion, ID }, (response) => {
            const CLASE = JSON.parse(response);
            $('#fechaD').val(CLASE.fecha_clase);
            $('#duracionD').val(CLASE.duracion_clase);
            $('#cursoD').val(CLASE.nombre_crs);
            $('#temaD').val(CLASE.tema_clase);
            $('#tutorD').val(CLASE.tutor);
            $('#adulMD').val(CLASE.nombre_adMay);
            
        });
    
    });
})

function datos_clase() {
    funcion = "buscar_id";
    ID = $('#id_clase').val();
    $.post('../controlador/claseController.php', { ID, funcion }, (response) => {
        const CLASE = JSON.parse(response);
        $('#fecha').val(CLASE.fecha_clase);
        $('#duracion').val(CLASE.duracion_clase);
        $('#curso').val(CLASE.nombre_crs);
        $('#tema').val(CLASE.tema_clase);
        $('#tutor').val(CLASE.tutor);
        $('#adulM').val(CLASE.nombre_adMay);
        console.log(response);
    });
}

