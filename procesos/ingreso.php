<?php
include '../conexion.php';
include '../crud/crudIngreso.php';

$crud = new crudIngreso();
$datos = array('correo' => $_POST['correo'],
                'contrasena'=> $_POST['contrasena']);
$resultado = $crud->consultarUsu($datos);
if (count($resultado) > 0){
    echo 
    '<script>window,location.href="archivodondevadespuesdeiniciar(../ingrese.php); alert(" Se ha iniciado sesión correctamente");</script>';
}else{
    echo
    '<script>window,location.href="./registro.php"; alert(" Contraseña o correo incorrecto");</script>';
}
?>
