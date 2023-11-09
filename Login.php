<!DOCTYPE html>
<html>
<head>
    <title>INICIAR SESIÓN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="Validation.js"></script>
    
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">RES_VAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de  j</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="centrardiv">
        <div class="container">
            <form id="loginform" class="form" action="" method="post">
                <h1>logo</h1>
                <span class="input-span">
                    <label for="identificacion" class="label">Identificacion</label>
                    <input type="text" name="adm_documento" id="identificacion">
                </span>
                <span class="input-span">
                    <label for="password" class="label">Contraseña</label>
                    <input type="password" name="adm_contrasena" id="contrasena">
                </span>
                <span class="span"><a href="#"><b>¿Olvidó su contraseña?</b></a></span>
                <input class="submit" type="submit" value="Iniciar Sesión">
                <span class="span">¿No tienes cuenta? <a href="#">Registrar</a></span>
            </form>
        </div>
    </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script type="text/javascript" src="Validation.js"></script>
              
    </body>
</html>
