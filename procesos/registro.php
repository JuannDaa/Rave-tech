<?php
include '../conexion.php';
include '../crud/crudIngreso.php';

$crud = new crudIngreso();
    
    $datos = array(
        'id' => '',
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'contrasena' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT),
        'direccion' => $_POST['direccion']
    );
    $resultado = $crud->registrarUsuario($datos);
if (count($resultado) > 0){
    echo 
    '<script>window,location.href="archivodondevadespuesdeiniciar(../ingrese.php); alert("Registro exitoso");</script>';
}else{
    echo
    '<script>window,location.href="./registro.php"; alert("Error de registro");</script>';
}
?>

