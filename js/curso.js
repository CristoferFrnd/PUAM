$(document).ready(function () {
    listar_cursos();

    function listar_cursos() {
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
            $('#cursos').html(template);
        });
    }
})
