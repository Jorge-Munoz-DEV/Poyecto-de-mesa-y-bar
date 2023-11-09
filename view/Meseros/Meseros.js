var tabla;

    function init(){

    }

    $(document).ready(function() {
        tabla = $('#MeserosDatos').DataTable({
            "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<div class='text-center'><div class='btn-group'>" +
            "<button class='btn btn-primary btnEditarMes'>Editar <i class='fa-solid fa-pencil'></i></button>" +
            "<button class='btn btn-danger btnBorrarMes'>Borrar  <i class='fa-solid fa-trash'></i></button></div>"
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
                url: '../../controller/mesero.php?op=listar',
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
    $('#mes_id').val(id);
    $('#mes_codigo').val(codigo);
    $('#mes_nombres').val(nombre);
    $('#mes_apellidos').val(apellido);
    $('#mes_documento').val(documento);
    $('#mes_telefono').val(telefono);
    $('#mes_direccion').val(direccion);
    $('#mes_correo').val(correo);
    $('#mes_sexo').val(sexo);
    $('#mes_contrasena').val(contrasena);

    // Mostrar el modal de edición
    $('#modalEditarMeseros').modal('show');
}


$('#btnGuardarMes').click(function () {
    // Obtener los valores de los campos de entrada del modal
    var id = $('#mes_id').val();
    var codigo = $('#mes_codigo').val();
    var nombre = $('#mes_nombres').val();
    var apellido = $('#mes_apellidos').val();
    var documento = $('#mes_documento').val();
    var telefono = $('#mes_telefono').val();
    var direccion = $('#mes_direccion').val();
    var correo = $('#mes_correo').val();
    var sexo = $('#mes_sexo').val();
    var contrasena = $('#mes_contrasena').val();
console.log(id, codigo, nombre, apellido);
    // Crear un objeto de datos con los valores
    var datos = {
        mes_id: id,
        mes_codigo: codigo,
        mes_nombres: nombre,
        mes_apellidos: apellido,
        mes_documento: documento,
        mes_telefono: telefono,
        mes_direccion: direccion,
        mes_correo: correo,
        mes_sexo: sexo,
        mes_contrasena: contrasena
    };
   
    // Realizar la solicitud AJAX para actualizar los datos
    $.ajax({
        type: 'POST',
        url: '../../controller/mesero.php?op=actualizar',
        data: datos, // Configurar datos con el objeto de datos
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Éxito: hacer algo si es necesario
                console.log("Guardado exitosamente");
                
                // Cerrar el modal
                $('#modalEditarMeseros').modal('hide');
                window.location.href = "../Meseros/index.php";
            } else {
                // Error: manejar el error si es necesario
                console.log("Error al guardar");
            }
        },
        error: function (e) {
            console.log("Error: " + e.message);
            window.location.href = "../../controller/mesero.php?op=actualizar";
        }
    });
});



// Controlador de clic para el botón "Editar" en la tabla
$('#MeserosDatos tbody').on('click', '.btnEditarMes', function () {
    var data = tabla.row($(this).parents('tr')).data();
    abrirModalEdicion(data);
});



    $('#MeserosDatos tbody').on('click', '.btnBorrarMes', function () {
        var data = tabla.row($(this).parents('tr')).data();
        var id = data[0]; // El ID se encuentra en la primera columna
        console.log(id);
        Swal.fire({
            title: 'Eliminar Mesero',
            text: "¿Estás seguro que deseas eliminar el mesero?",
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
                    url: '../../controller/mesero.php?op=eliminar',
                    data: { mes_id: id },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Éxito, recargar los datos en la tabla
                            
                            Swal.fire({
                                title: 'Mesero borrado',
                                text: 'El Mesero ha sido borrado correctamente',
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
                                'No se pudo eliminar el Mesero',
                                'error'
                            );
                        }
                    },
                    error: function (e) {
                        console.log("Error: " + e.message);
                        Swal.fire(
                            'Error',
                            'Ocurrió un error al eliminar el Mesero',
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
        window.location.href ="../Meseros/nuevo.php" ;

    });
    

    init();