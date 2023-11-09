$(document).ready(function() {

$('#cerrar-sesion-link').on('click', function(e) {
    e.preventDefault(); // Evita la acción predeterminada del enlace

    // Envía una solicitud AJAX para cerrar la sesión
    $.ajax({
        url: '/MYB/config/logout.php',
        type: 'POST', // O puedes usar 'GET' según cómo lo hayas configurado en logout.php
        success: function(data) {
            // Redirige a la página de inicio u otra página después de cerrar la sesión
            // window.location.href = '../index.php';
        }
    });
});
});