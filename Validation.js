$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        var usuario = $.trim($("#identificacion").val());    
        var password = $.trim($("#contrasena").val());
        
        if (usuario === "" || password === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Debe ingresar un usuario y/o contraseña',
            });
            return false;
        } else {
            $.ajax({
                
                url: "/MYB/config/login.php",
                type: "POST",
                dataType: "json",
                data: { usuario: usuario, password: password },
                success: function(data) {
                    if (data === null) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuario y/o contraseña incorrecta',
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Conexión exitosa!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ingresar'
                        }).then((result) => {
                            if (result.value) {
                                // Redirige a la página de inicio o dashboard
                                window.location.href = "/MYB/view/home/index.php";
                            }
                        });
                    }
                }
            });
        }
    });
});