<?php

    class Usuarios extends Conectar {

            public function get_Usuarios() {
                try {
                $conectar=parent::Conexion();
                $sql = "SELECT adm_id, adm_codigo, adm_nombres, adm_apellidos, adm_documento, adm_telefono, adm_direccion, adm_correo,adm_sexo,adm_contrasena FROM tbl_admin";
                $sql = $conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll();

                } catch (\Throwable $th) {
                   die($th);
                }
               
            }
                public function get_Usuarios_x_id($adm_id) {
                    $conectar=parent::conexion();
                    $sql = "SELECT adm_id, adm_codigo, adm_nombres, adm_apellidos, adm_documento, adm_telefono, adm_direccion, adm_correo FROM tbl_admin WHERE adm_id=?";
                    $sql = $conectar->prepare($sql);
                    $sql->bindvalue(1,$adm_id);
                    $sql->execute();
                    return $resultado=$sql->fetchAll();
                }

                public function insert_Usuarios($adm_codigo, $adm_nombres, $adm_apellidos, $adm_documento, $adm_telefono, $adm_direccion, $adm_correo, $adm_sexo, $adm_contrasena) {
                    $conectar = parent::conexion();
                    $sql = "INSERT INTO tbl_admin (adm_codigo, adm_nombres, adm_apellidos, adm_documento, adm_telefono, adm_direccion, adm_correo, adm_sexo, adm_contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $stmt = $conectar->prepare($sql);
                    
                    // Enlaza los valores a los marcadores de posición
                    $stmt->bindValue(1, $adm_codigo);
                    $stmt->bindValue(2, $adm_nombres);
                    $stmt->bindValue(3, $adm_apellidos);
                    $stmt->bindValue(4, $adm_documento);
                    $stmt->bindValue(5, $adm_telefono);
                    $stmt->bindValue(6, $adm_direccion);
                    $stmt->bindValue(7, $adm_correo);
                    $stmt->bindValue(8, $adm_sexo);
                    $stmt->bindValue(9, $adm_contrasena);
                    
                    if ($stmt->execute()) {
                        return true; // Éxito
                    } else {
                        return false; // Error
                    }
                }
                
                public function delete_Usuarios($adm_id) {
                    $conectar = parent::conexion();
                    $sql = "DELETE FROM tbl_admin WHERE adm_id = :adm_id";
                    $stmt = $conectar->prepare($sql);
                    $stmt->bindParam(':adm_id', $adm_id, PDO::PARAM_INT);
                
                    if ($stmt->execute()) {
                        return true; // La eliminación fue exitosa
                    } else {
                        return false; // No se pudo eliminar el usuario
                    }
                }
                public function update_Usuarios($adm_id, $adm_codigo, $adm_nombres, $adm_apellidos, $adm_documento, $adm_telefono, $adm_direccion, $adm_correo, $adm_sexo, $adm_contrasena) {
                    $conectar=parent::conexion();
                    $sql = "UPDATE tbl_admin SET adm_codigo='$adm_codigo', adm_nombres='$adm_nombres', adm_apellidos='$adm_apellidos', adm_documento='$adm_documento', adm_telefono='$adm_telefono', adm_direccion='$adm_direccion', adm_correo='$adm_correo', adm_sexo='$adm_sexo', adm_contrasena='$adm_contrasena' WHERE adm_id='$adm_id' ";
                    $sql = $conectar->prepare($sql);
                    $sql->execute();
                    return $resultado=$sql->fetchAll();
                   
                }
    }
    

?>