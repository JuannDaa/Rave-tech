<?php
include '../conexion.php';
$conection = new conexion();
$conection = $conection->conectar();

// Ejecutamos una consulta para obtener las sedes
$result = mysqli_query($conection, "SELECT id_sede,nombre, latitud, longitud FROM sedes");

// Convertimos los resultados en un array asociativo
$sedes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Convertimos el array en JSON y lo devolvemos
echo json_encode($sedes);
?>