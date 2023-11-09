$(document).ready(function () {
    // Capturar el envío del formulario
    $('#formulario').submit(function (e) {
        e.preventDefault(); // Evitar que se envíe el formulario de manera tradicional
        
        // Obtener los valores de los campos
        var id = $('#id').val();
        var codigo = $('#codigo').val();
        var nombres = $('#nombres').val();
        var apellidos = $('#apellidos').val();
        var documento = $('#documento').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
        var correo = $('#correo').val();
        var sexo = $('#sexo').val();
        var contrasena = $('#contrasena').val();
        console.log(id, codigo, nombres, apellidos,documento,telefono,direccion,correo,sexo,contrasena);
        // Crear un objeto de datos con los valores
        var datos = {
            adm_id: id,
            adm_codigo: codigo,
            adm_nombres: nombres,
            adm_apellidos: apellidos,
            adm_documento: documento,
            adm_telefono: telefono,
            adm_direccion: direccion,
            adm_correo: correo,
            adm_sexo: sexo,
            adm_contrasena: contrasena
        };

        // Realizar la solicitud AJAX para insertar los datos
        $.ajax({
            type: 'POST',
            url: '../../controller/usuario.php?op=insertar',
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Éxito: redirigir a la página de Usuarios
                    window.location.href = '/MYB/view/Usuarios/index.php';
                } else {
                    console.log("Error al guardar");
                }
            },
            error: function (e) {
                console.log("Error: " + e.responseText);
            }
        });
    });
});