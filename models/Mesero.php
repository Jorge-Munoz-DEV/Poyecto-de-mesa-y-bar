<?php

    class Mesero extends Conectar {

            public function get_Meseros() {
                try {
                $conectar=parent::Conexion();
                $sql = "SELECT * FROM bd_myb.tblmesero;";
                $sql = $conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();

                } catch (\Throwable $th) {
                   die($th);
                }
               
            }
                // public function get_Usuarios_x_id($adm_id) {
                //     $conectar=parent::conexion();
                //     $sql = "SELECT adm_id, adm_codigo, adm_nombres, adm_apellidos, adm_documento, adm_telefono, adm_direccion, adm_correo FROM tbl_admin WHERE adm_id=?";
                //     $sql = $conectar->prepare($sql);
                //     $sql->bindvalue(1,$adm_id);
                //     $sql->execute();
                //     return $resultado=$sql->fetchAll();
                // }

                public function insert_Meseros($mes_codigo, $mes_nombres, $mes_apellidos, $mes_documento, $mes_telefono, $mes_direccion, $mes_correo, $mes_sexo, $mes_contrasena) {
                    $conectar = parent::conexion();
                    $sql = "INSERT INTO tblmesero (mes_codigo, mes_nombres, mes_apellidos, mes_documento, mes_telefono, mes_direccion, mes_correo, mes_sexo, mes_contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = $conectar->prepare($sql);
                    
                    // Enlaza los valores a los marcadores de posición
                    $stmt->bindValue(1, $mes_codigo);
                    $stmt->bindValue(2, $mes_nombres);
                    $stmt->bindValue(3, $mes_apellidos);
                    $stmt->bindValue(4, $mes_documento);
                    $stmt->bindValue(5, $mes_telefono);
                    $stmt->bindValue(6, $mes_direccion);
                    $stmt->bindValue(7, $mes_correo);
                    $stmt->bindValue(8, $mes_sexo);
                    $stmt->bindValue(9, $mes_contrasena);
                    
                    if ($stmt->execute()) {
                        return true; // Éxito
                    } else {
                        return false; // Error
                    }
                }
                
                public function delete_Meseros($mes_id) {
                    $conectar = parent::conexion();
                    $sql = "DELETE FROM tblmesero WHERE mes_id = :mes_id";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindParam(':mes_id', $mes_id, PDO::PARAM_INT);
                
                    if ($stmt->execute()) {
                        return true; // La eliminación fue exitosa
                    } else {
                        return false; // No se pudo eliminar el usuario
                    }
                }
                public function update_Meseros($mes_id, $mes_codigo, $mes_nombres, $mes_apellidos, $mes_documento, $mes_telefono, $mes_direccion, $mes_correo, $mes_sexo, $mes_contrasena) {
                    $conectar = parent::conexion();
                    $sql = "UPDATE tblmesero SET mes_codigo='$mes_codigo', mes_nombres='$mes_nombres', mes_apellidos='$mes_apellidos', mes_documento='$mes_documento', mes_telefono='$mes_telefono', mes_direccion='$mes_direccion', mes_correo='$mes_correo', mes_sexo='$mes_sexo', mes_contrasena='$mes_contrasena' WHERE mes_id='$mes_id'";
                    $sql = $conectar->prepare($sql);
                    $success = $sql->execute();
                
                    if ($success) {
                        echo json_encode(array('success' => true));
                    } else {
                        echo json_encode(array('success' => false, 'error' => 'Error al actualizar el registro.'));
                    }
                }
    }
    

?>