$(document).ready(function () {
    $('#curso').val($('#us_curso').val());
    listar_tclase();
    listar_am_al();
    if ($('#us_tipo').val() == 2) {
        listar_clases_al($('#us_id').val());
    } else {
        listar_clases();
    }
    //datos_alumno();

    function listar_clases(consulta, aux) {
        funcion = "listar";
        // if (aux == "next") {
        //     rowsInit = $('#rows').val();
        //     rows = parseInt(rowsInit) + 50;
        //     $('#rows').val(rows);
        // }
        // else {
        //     rows = $('#rows').val();
        //     rowsInit = parseInt(rows) - 6;
        //     rows = parseInt(rows) - 3;
        //     $('#rows').val(rows);

        // }
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

    $(document).on('click', '#next', (e) => {
        listar_clases(null, "next");
    });

    $(document).on('click', '#prev', (e) => {
        listar_clases(null, 'prev');
    });

    function listar_clases_al(id, consulta) {
        funcion = "buscar_clase_alumno";
        $.post('../controlador/claseController.php', { id, funcion, consulta }, (response) => {
            const CLASES = JSON.parse(response);
            let template = ``;
            CLASES.forEach(clase => {
                template += `
                <tr data-id="${clase.id_clase}">
                    <td>${clase.fecha_clase}</td>
                    <td>${clase.nombre_adMay}</td>
                    <td>${clase.nombre_crs}</td>
                    <td>${clase.tema_clase}</td>
                    <td>${clase.descripcion_tipoClase}</td>
                    <td><button class='verdetalle btn btn-primary' data-toggle='modal' data-target='#modalDetalle'>Ver detalle</button></td>
                </tr>
                    `;
            });
            $('#clases_alumno').html(template);
        });
    }

    $(document).on('keyup', '#search', function () {
        let valor = $(this).val();
        if (valor != '') {
            listar_clases(valor);
        } else {
            listar_clases();
        }
    })

    $(document).on('keyup', '#search2', function () {
        let valor = $(this).val();
        if (valor != '') {
            listar_clases_al($('#us_id').val(), valor);
        } else {
            listar_clases_al($('#us_id').val());
        }
    })

    function listar_tclase() {
        funcion = "buscar_tclase";
        $.post('../controlador/claseController.php', { funcion }, (response) => {
            
            const TCLASES = JSON.parse(response);
            let template = ``;
            TCLASES.forEach(tclase => {
                template += `
                        <option value="${tclase.id_tcrs}">${tclase.nombre_tcrs}</option>
                    `;
            });
            $('#tclases').html(template);
        });
    }

    function listar_am_al() {
        funcion = "buscar_am_al";
        ID = $('#us_id').val();
        $.post('../controlador/claseController.php', { funcion, ID }, (response) => {
            console.log(response);
            const AMPORAL = JSON.parse(response);
            let template = ``;
            AMPORAL.forEach(amxal => {
                template += `
                        <option value="${amxal.id_adMay}">${amxal.nombre_admay}</option>
                    `;
            });
            $('#ad_al').html(template);
        });
    }



    $(document).on('click', '.verdetalle', (e) => {
        const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
        const ID = $(ELEMENTO).attr('data-id');

        $.post('../helpers/infoClase.php', { ID }, (response) => {
            const CLASE = JSON.parse(response);
            $('#fechaD').val(CLASE[0].fecha_clase);
            $('#duracionD').val(CLASE[0].duracion_clase);
            $('#cursoD').val(CLASE[0].nombre_crs);
            $('#temaD').val(CLASE[0].tema_clase);
            $('#tutorD').val(CLASE[0].tutor);
            $('#adulMD').val(CLASE[0].nombre_adMay);
            let $img = document.getElementById('img');
            $img.setAttribute('src',CLASE[0].evidencia);
        });

    });

    // $(document).on('click', '.verdetalle', (e) => {
    //     funcion = 'buscar_id';
    //     const ELEMENTO = $(this)[0].activeElement.parentElement.parentElement;
    //     const ID = $(ELEMENTO).attr('data-id');

    //     $.post('../controlador/claseController.php', { funcion, ID }, (response) => {
    //         const CLASE = JSON.parse(response);
    //         $('#fechaD').val(CLASE.fecha_clase);
    //         $('#duracionD').val(CLASE.duracion_clase);
    //         $('#cursoD').val(CLASE.nombre_crs);
    //         $('#temaD').val(CLASE.tema_clase);
    //         $('#tutorD').val(CLASE.tutor);
    //         $('#adulMD').val(CLASE.nombre_adMay);

    //     });

    // });

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
            //console.log(response);
        });
    }


})



