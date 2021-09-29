$(document).ready(function () {
    listar_cursos();

    function listar_cursos(consulta) {
        funcion = "listar";
        $.post('../controlador/cursoController.php', { funcion }, (response) => {

            const CURSOS = JSON.parse(response);
            let template = ``;
            CURSOS.forEach(curso => {
                template += `
                    <tr data-id=${curso.id_crs}>
                        <td><input type="checkbox" id="check${curso.id_crs}"/></td>
                        <td>${curso.nombre_crs}</td>

                    </tr>
                    `;
            });
            $('#matr_Crs').html(template);
        });
    }

    // function llenar_tutores() {

    //     let lista = document.querySelectorAll("select");

    //     lista.forEach(combo => {
    //         id = combo.getAttribute("id");

    //         var length = combo.options.length;

    //         for (i = length - 1; i >= 0; i--) {
    //             combo.options[i] = null;
    //         }

    //         funcion = 'buscar_crs_est';

    //         $.post('../controlador/alumnoController.php', { funcion, id }, (response) => {
    //             const ALUMNOS = JSON.parse(response);


    //             ALUMNOS.forEach(alumno => {
    //                 let option = document.createElement('option');
    //                 option.value = alumno.id_usuario;
    //                 option.text = alumno.nombre;
    //                 combo.appendChild(option);
    //             });
    //         });


    //     })
    // }

    $(document).on('click', '.btn-getId', (e) => {

        llenar_tutores();
    });
})
