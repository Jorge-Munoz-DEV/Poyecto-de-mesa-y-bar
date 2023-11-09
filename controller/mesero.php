<?php
require_once("../config/conexion.php");
require_once("../models/Mesero.php");

$mesero = new Mesero();

switch ($_GET["op"]) {
    case 'listar':
        $datos = $mesero->get_Meseros();
        $data = Array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["mes_id"];
            $sub_array[] = $row["mes_codigo"];
            $sub_array[] = $row["mes_nombres"];
            $sub_array[] = $row["mes_apellidos"];
            $sub_array[] = $row["mes_documento"];
            $sub_array[] = $row["mes_telefono"];
            $sub_array[] = $row["mes_direccion"];
            $sub_array[] = $row["mes_correo"];
            $sub_array[] = $row["mes_sexo"];
            $sub_array[] = $row["mes_contrasena"];
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
            $mes_id = $_POST["mes_id"];
            $mes_codigo = $_POST["mes_codigo"];
            $mes_nombres = $_POST["mes_nombres"];
            $mes_apellidos = $_POST["mes_apellidos"];
            $mes_documento = $_POST["mes_documento"];
            $mes_telefono = $_POST["mes_telefono"];
            $mes_direccion = $_POST["mes_direccion"];
            $mes_correo = $_POST["mes_correo"];
            $mes_sexo = $_POST["mes_sexo"];
            $mes_contrasena = $_POST["mes_contrasena"];

            try {
                // Es una actualización
                $mesero->update_Meseros($mes_id, $mes_codigo, $mes_nombres, $mes_apellidos, $mes_documento, $mes_telefono, $mes_direccion, $mes_correo, $mes_sexo, $mes_contrasena);
            } catch (\Throwable $th) {
                // Enviar una respuesta JSON de error
                echo json_encode(array('success' => false, 'error' => $th->getMessage()));
            }
        break;
        

    
        case 'insertar':
            try {
                $mes_codigo = $_POST["mes_codigo"];
                $mes_nombres = $_POST["mes_nombres"];
                $mes_apellidos = $_POST["mes_apellidos"];
                $mes_documento = $_POST["mes_documento"];
                $mes_telefono = $_POST["mes_telefono"];
                $mes_direccion = $_POST["mes_direccion"];
                $mes_correo = $_POST["mes_correo"];
                $mes_sexo = $_POST["mes_sexo"];
                $mes_contrasena = $_POST["mes_contrasena"];
        
                // Llama a la función insert_Meseros pasando los valores como argumentos
                $resultado = $mesero->insert_Meseros($mes_codigo, $mes_nombres, $mes_apellidos, $mes_documento, $mes_telefono, $mes_direccion, $mes_correo, $mes_sexo, $mes_contrasena);
        
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
            $mes_id = $_POST["mes_id"];
            $resultado = $mesero->delete_Meseros($mes_id);
            if ($resultado) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false]);
            }
            break;
        
}
?>