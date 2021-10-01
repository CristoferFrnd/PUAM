$(document).ready(function () {
    $('#avisoD').hide();
    $('#form-login').submit(e => {
        user = $('#user').val();
        pass = $('#pass').val();
        funcion = 'registrar';
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


var current = null;
document.querySelector('#email').addEventListener('focus', function (e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
            value: 0,
            duration: 700,
            easing: 'easeOutQuart'
        },
        strokeDasharray: {
            value: '240 1386',
            duration: 700,
            easing: 'easeOutQuart'
        }
    });
});

document.querySelector('#password').addEventListener('focus', function (e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
            value: -336,
            duration: 700,
            easing: 'easeOutQuart'
        },
        strokeDasharray: {
            value: '240 1386',
            duration: 700,
            easing: 'easeOutQuart'
        }
    });
});
document.querySelector('#submit').addEventListener('focus', function (e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
            value: -730,
            duration: 700,
            easing: 'easeOutQuart'
        },
        strokeDasharray: {
            value: '530 1386',
            duration: 700,
            easing: 'easeOutQuart'
        }
    });
});