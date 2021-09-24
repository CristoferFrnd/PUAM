$(document).ready(function () {
	$('#form-login').submit(e => {
        user = $('#user').val();
        pass = $('#pass').val();
        funcion = 'registrar';
        $.post('controlador/loginController.php', { user, pass }, (response) => {
            if(response == 'nologin'){
				// no login
				alert("Usuario o Contraseña Incorrecto");
			} else {
				window.open("vista/registrar_clase.php", "_self");
			}
        });

        e.preventDefault();
    });
});