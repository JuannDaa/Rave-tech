<?php
require_once "conexion.php";

class crudRegistro {
    public function registrarUsuario($datos) {
        try {
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $telefono = $datos['telefono'];
            $contrasena = password_hash($datos['contrasena'], PASSWORD_DEFAULT);
            $direccion = $datos['direccion'];
            $correo = $datos['correo'];

            $conection = conexion::conectar();

            $sql = "INSERT INTO usuario (nombre, apellido, telefono, contrasena, direccion, correo) VALUES (?, ?, ?, ?, ?, ?)";
            $sentencia = $conection->prepare($sql);
            $sentencia->bind_param('ssssss', $nombre, $apellido, $telefono, $contrasena, $direccion, $correo);
            $sentencia->execute();

            return $sentencia->insert_id;

        } catch (Exception $e) {
            die("Error al registrar el usuario: " . $e->getMessage());
        }
    }
}
?>