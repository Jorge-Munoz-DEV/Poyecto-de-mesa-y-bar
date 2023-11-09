var tabla;

    function init(){

    }

    $(document).ready(function() {
        tabla = $('#UsuariosDatos').DataTable({
            "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<div class='text-center'><div class='btn-group'>" +
            "<button class='btn btn-primary btnEditar'>Editar <i class='fa-solid fa-pencil'></i></button>" +
            "<button class='btn btn-danger btnBorrar'>Borrar  <i class='fa-solid fa-trash'></i></button></div>"
            }],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },
            "ajax": {
                url: '../../controller/usuario.php?op=listar',
                type: "get",
                dataType: "json",
                error: function(e) {
                    console.log("Error: " + e.message);
                }
            }
        });

        



    });
    // Función para abrir el modal de edición y cargar datos
function abrirModalEdicion(data) {
    var id = data[0];
    var codigo = data[1];
    var nombre = data[2];
    var apellido = data[3];
    var documento = data[4];
    var telefono = data[5];
    var direccion = data[6];
    var correo = data[7];
    var sexo = data[8];
    var contrasena = data[9];

    // Asignar los valores a los campos del modal
    $('#ids').val(id);
    $('#Codigo').val(codigo);
    $('#Nombres').val(nombre);
    $('#Apellidos').val(apellido);
    $('#Documento').val(documento);
    $('#Telefono').val(telefono);
    $('#Direccion').val(direccion);
    $('#Correo').val(correo);
    $('#Sexo').val(sexo);
    $('#Contraseña').val(contrasena);

    // Mostrar el modal de edición
    $('#modalEditar').modal('show');
}


$('#btnGuardar').click(function () {
    // Obtener los valores de los campos de entrada del modal
    var id = $('#ids').val();
    var codigo = $('#Codigo').val();
    var nombre = $('#Nombres').val();
    var apellido = $('#Apellidos').val();
    var documento = $('#Documento').val();
    var telefono = $('#Telefono').val();
    var direccion = $('#Direccion').val();
    var correo = $('#Correo').val();
    var sexo = $('#Sexo').val();
    var contrasena = $('#Contraseña').val();
console.log(id, codigo, nombre, apellido);
    // Crear un objeto de datos con los valores
    var datos = {
        adm_id: id,
        adm_codigo: codigo,
        adm_nombres: nombre,
        adm_apellidos: apellido,
        adm_documento: documento,
        adm_telefono: telefono,
        adm_direccion: direccion,
        adm_correo: correo,
        adm_sexo: sexo,
        adm_contrasena: contrasena,
        adm_id: id
    };

    // Realizar la solicitud AJAX para actualizar los datos
    $.ajax({
        type: 'POST',
        url: '../../controller/usuario.php?op=actualizar',
        data: datos, // Configurar datos con el objeto de datos
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Éxito: hacer algo si es necesario
                console.log("Guardado exitosamente");
                
                // Cerrar el modal
                $('#modalEditar').modal('hide');
                window.location.href = "../Usuarios/index.php";
            } else {
                // Error: manejar el error si es necesario
                console.log("Error al guardar");
            }
        },
        error: function (e) {
            console.log("Error: " + e.message);
            
        }
    });
});



// Controlador de clic para el botón "Editar" en la tabla
$('#UsuariosDatos tbody').on('click', '.btnEditar', function () {
    var data = tabla.row($(this).parents('tr')).data();
    abrirModalEdicion(data);
});



    $('#UsuariosDatos tbody').on('click', '.btnBorrar', function () {
        var data = tabla.row($(this).parents('tr')).data();
        var id = data[0]; // El ID se encuentra en la primera columna
        console.log(id);
        Swal.fire({
            title: 'Eliminar usuario',
            text: "¿Estás seguro que deseas eliminar el usuario?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, estoy seguro',
            cancelButtonText: 'No, no quiero'
        }).then((result) => {
            if (result.isConfirmed) {

                // Enviar el ID a eliminar al servidor utilizando $.ajax
                $.ajax({
                    type: 'POST',
                    url: '../../controller/usuario.php?op=eliminar',
                    data: { adm_id: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Éxito, recargar los datos en la tabla
                            
                            Swal.fire({
                                title: 'Usuario borrado',
                                text: 'El usuario ha sido borrado correctamente',
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true); // Recargar la página desde el servidor
                                }
                            });                            
                        } else {
                            // Algo salió mal, mostrar un mensaje de error
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar el usuario',
                                'error'
                            );
                        }
                    },
                    error: function (e) {
                        console.log("Error: " + e.message);
                        Swal.fire(
                            'Error',
                            'Ocurrió un error al eliminar el usuario',
                            'error'
                        );
                    }
                });
                
            }
        });
    });

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

    $(document).on('click', '#btnNuevo', function () {
        window.location.href ="../Usuarios/edit.php" ;

    });
    

    init();