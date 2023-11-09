<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");

$usuario = new Usuarios();

switch ($_GET["op"]) {
    case 'listar':
        $datos = $usuario->get_Usuarios();
        $data = Array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["adm_id"];
            $sub_array[] = $row["adm_codigo"];
            $sub_array[] = $row["adm_nombres"];
            $sub_array[] = $row["adm_apellidos"];
            $sub_array[] = $row["adm_documento"];
            $sub_array[] = $row["adm_telefono"];
            $sub_array[] = $row["adm_direccion"];
            $sub_array[] = $row["adm_correo"];
            $sub_array[] = $row["adm_sexo"];
            $sub_array[] = $row["adm_contrasena"];
            $data[] = $sub_array;
        }

        $results = array(
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

        case 'actualizar':
            // Recopila los datos enviados por la solicitud POST
             $adm_id = $_POST["adm_id"];
            $adm_codigo = $_POST["adm_codigo"];
            $adm_nombres = $_POST["adm_nombres"];
            $adm_apellidos = $_POST["adm_apellidos"];
            $adm_documento = $_POST["adm_documento"];
            $adm_telefono = $_POST["adm_telefono"];
            $adm_direccion = $_POST["adm_direccion"];
            $adm_correo = $_POST["adm_correo"];
            $adm_sexo = $_POST["adm_sexo"];
            $adm_contrasena = $_POST["adm_contrasena"];

        
            try {
                // Es una actualización
                $usuario->update_Usuarios($adm_id , $adm_codigo, $adm_nombres, $adm_apellidos, $adm_documento, $adm_telefono, $adm_direccion, $adm_correo, $adm_sexo, $adm_contrasena);
                
            // Redirigir a otra página
            // header("Location: ../Usuarios/index.php");
            // exit;
            echo json_encode(array('success' => true));
        } catch (\Throwable $th) {
            // Enviar una respuesta JSON de error
            echo json_encode(array('success' => false, 'error' => $th->getMessage()));
        }
        break;
        

    
        case 'insertar':
            try {
                $adm_codigo = $_POST["adm_codigo"];
                $adm_nombres = $_POST["adm_nombres"];
                $adm_apellidos = $_POST["adm_apellidos"];
                $adm_documento = $_POST["adm_documento"];
                $adm_telefono = $_POST["adm_telefono"];
                $adm_direccion = $_POST["adm_direccion"];
                $adm_correo = $_POST["adm_correo"];
                $adm_sexo = $_POST["adm_sexo"];
                $adm_contrasena = $_POST["adm_contrasena"];
                
                // Llama a la función insert_Usuarios pasando los valores como argumentos
                $resultado = $usuario->insert_Usuarios($adm_codigo, $adm_nombres, $adm_apellidos, $adm_documento, $adm_telefono, $adm_direccion, $adm_correo, $adm_sexo, $adm_contrasena);
                
                // Verifica si la inserción fue exitosa y envía la respuesta JSON correspondiente
                if ($resultado) {
                    echo json_encode(array('success' => true));
                } else {
                    echo json_encode(array('success' => false, 'error' => 'Error al guardar'));
                }
            } catch (\Throwable $th) {
                echo json_encode(array('success' => false, 'error' => $th->getMessage()));
            }
            break;
        
            
        case 'eliminar':
            $adm_id = $_POST["adm_id"];
            $resultado = $usuario->delete_Usuarios($adm_id);
            if ($resultado) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }
            break;
        
}
?>