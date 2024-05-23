<?php 
    require_once "../conexion.php";
    $conection = new conexion();
    $conection = $conection->conectar();
    class crudIngreso {
        public function consultarUsu($datos){
            try {
                $correo = $datos['correo'];
                $contrasena = $datos['contrasena'];
                $conection = conexion::conectar();
                /* var_dump($conection); */
                
                /* var_dump($datos ['contrasena']); */
                $sql = "SELECT * FROM usuario WHERE correo = ? and contrasena = ?";
                $sentencia = $conection->prepare($sql);
                $sentencia->bind_Param('ss',$datos['correo'], $datos['contrasena']);
                $sentencia->execute();
                $consultar = $sentencia->get_result();
                    if($fila = $consultar->fetch_assoc()){
                        $consulta = "SELECT * FROM usuarios WHERE correo= '$correo' AND contrasena= '$contrasena'";
                        $consult = mysqli_query($conection, $consulta ) or die ("Error al traer los datos");
                        if($busqueda= mysqli_fetch_array($consult)){
                            return iterator_to_array($consult);
                        }
                    }else{
                        echo "<script>alert('Usuario o contraseña incorrecto intente nuevamente')</script>";
                        echo "<script>location.href='../registro.php'</script>";
                    }
            } catch (Exception $e) {
                die("Error al consultar el administrador: " . $e->getMessage());
            }
            
        }
        public function registrarUsuario($datos) {
            try {
                $nombre = $datos['nombre'];
                $apellido = $datos['apellido'];
                $telefono = $datos['telefono'];
                $contrasena = password_hash($datos['contrasena'], PASSWORD_DEFAULT);
                $direccion = $datos['direccion'];
                $correo = $datos['correo'];
    
                $conection = conexion::conectar();
    
                $sql = "INSERT INTO usuarios (nombre, apellido, telefono, contrasena, direccion, correo) VALUES (?, ?, ?, ?, ?, ?)";
                $sentencia = $conection->prepare($sql);
                $sentencia->bind_param('ssssss', $nombre, $apellido, $telefono, $contrasena, $direccion, $correo);
                $sentencia->execute();
                if ($sentencia->affected_rows > 0) {
                    echo "Usuario registrado correctamente";
                } else {
                    echo "Error al registrar el usuario";
                }
                return $sentencia->insert_id;
    
            } catch (Exception $e) {
                die("Error al registrar el usuario: " . $e->getMessage());
            }
        }
    }
?>