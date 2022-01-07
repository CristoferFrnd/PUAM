$(document).ready(function () {
    $('#avisoD').hide();
    
    $('#form-login').submit(e => {
        user = $('#user').val();
        pass = $('#pass').val();
        funcion = 'registrar';
        console.log(user, pass)
        $.post('controlador/loginController.php', { user, pass }, (response) => {
            if (response == 'nologin') {
                $('#avisoD').show();
                $('#avisoD').text("Usuario o Contraseña Incorrectos");
            } else {
                window.open("vista/registrar_clase.php", "_self");
            }
        });

        e.preventDefault();
    });
});
