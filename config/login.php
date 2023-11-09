<?php
session_start();

include_once 'conexion.php';
$objeto = new Conectar();
$conexion = $objeto->Conexion();

// Recepción de datos enviados mediante POST desde Ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// Utiliza la contraseña en texto plano en la consulta SQL
$consulta = "SELECT * FROM tbl_admin WHERE adm_documento = :usuario AND adm_contrasena = :password";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$resultado->bindParam(':password', $password, PDO::PARAM_STR); // No encripta la contraseña
$resultado->execute();

if ($resultado->rowCount() >= 1) {
    $data = $resultado->fetch(PDO::FETCH_ASSOC); // Obtén la primera fila de resultados
    $_SESSION["s_usuario"] = $data['adm_nombres']; // Guarda el valor de la columna adm_nombres en la sesión
} else {
    $_SESSION["s_usuario"] = null;
    $data = null;
}

// Devuelve los resultados en formato JSON
echo json_encode($data);

$conexion = null;
?>

