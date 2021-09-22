$(document).ready(function () {
        listar_cursos();

    function listar_cursos() {
        funcion = "listar";
        $.post('../controlador/cursoController.php', { funcion }, (response) => {
            console.log(response);
            const CURSOS = JSON.parse(response);
            let template = ``;
            CURSOS.forEach(curso => {
                template += `
                        <option value="${curso.id_crs}">${curso.nombre_crs}</option>
                    `;
            });
            $('#cursos').html(template);
        });
    }

});