$(document).ready(function () {
    // Capturar el envío del formulario
    $('#formularioMesero').submit(function (e) {
        e.preventDefault(); // Evitar que se envíe el formulario de manera tradicional
        
        // Obtener los valores de los campos
        var id = $('#mesid').val();
        var codigo = $('#mescodigo').val();
        var nombres = $('#mesnombres').val();
        var apellidos = $('#mesapellidos').val();
        var documento = $('#mesdocumento').val();
        var telefono = $('#mestelefono').val();
        var direccion = $('#mesdireccion').val();
        var correo = $('#mescorreo').val();
        var sexo = $('#messexo').val();
        var contrasena = $('#mescontrasena').val();
        console.log(id, codigo, nombres, apellidos,documento,telefono,direccion,correo,sexo,contrasena);
        // Crear un objeto de datos con los valores
        var datos = {
            mes_id: id,
            mes_codigo: codigo,
            mes_nombres: nombres,
            mes_apellidos: apellidos,
            mes_documento: documento,
            mes_telefono: telefono,
            mes_direccion: direccion,
            mes_correo: correo,
            mes_sexo: sexo,
            mes_contrasena: contrasena
        };

        // Realizar la solicitud AJAX para insertar los datos
        $.ajax({
            type: 'POST',
            url: '../../controller/mesero.php?op=insertar',
            data: datos,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Éxito: redirigir a la página de Usuarios
                    window.location.href = '/MYB/view/Meseros/index.php';
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