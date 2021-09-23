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
                        <td><input type="checkbox"/></td>
                        <td>${curso.nombre_crs}</td>
                        <td><select id="${curso.id_crs}"/></td>
                    </tr>
                    `;
            });
            $('#matr_Crs').html(template);
        });
    }

    function llenar_tutores() {
        funcion = "buscar_crs_est";
        id = "1";

        let lista = document.querySelectorAll("select");
        console.log(lista);

        lista.forEach(combo => {
            id = combo.getAttribute("id");
            funcion = 'buscar_crs_est';
            console.log(id);
            $.post('../controlador/alumnoController.php', { funcion, id }, (response) => {
                const ALUMNOS = JSON.parse(response);
                console.log(ALUMNOS);
                ALUMNOS.forEach(alumno => {
                    let option = document.createElement('option');
                    option.value = alumno.nombre_usuario;
                    option.text = alumno.nombre;
                    combo.appendChild(option);
                });
    
    
            });

            
        })
    }

    $(document).on('click', '.btn-matr', (e) => {
        llenar_tutores();
    });

})