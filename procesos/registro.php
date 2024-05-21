<?php
include './conexion.php';
include './crud/crudRegistro.php';

$crud = new crudIngreso();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); 
    $direccion = $_POST['direccion'];

    //insertar los datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo, contrasena, direccion) 
            VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$contrasena', '$direccion')";
    
}
$datos = array('correo' => $_POST['correo'],
                'contrasena'=> $_POST['contrasena']);
$resultado = $crud->consultarUsu($datos);
if (count($resultado) > 0){
    echo 
    '<script>window,location.href="archivodondevadespuesdeiniciar(../ingrese.php); alert("Registro exitoso");</script>';
}else{
    echo
    '<script>window,location.href="./registro.php"; alert("Error de registro");</script>';
}
?>

