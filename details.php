<?php
require "procesos/config.php";
require "conexion.php";
$conection = conexion::conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';


if ($id == '' || $token == ''){
    echo 'Error al procesar la peticion';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    if ($token == $token_tmp) {
        if ($conection) {
            $sql = $conection->prepare("SELECT COUNT(id) FROM productos WHERE id = ? AND activo = 1");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                $sql = $conection->prepare("SELECT nombre, descripcion, precio, descuent(o FROM productos WHERE id = ? AND activo = 1 LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $precio = $row['precio'];
                    $descuento = $row['descuento'];
                    $precio_desc = $precio -(($precio*$descuento)-100);
                    $dir_images = 'images/'.$id. '/';

                    $rutaImg = $dir_images . 'pc1.png';
                    if (!file_exists($rutaImg)) {
                        $rutaImg = 'images/descarga.png';
                    }
                    $images = array();
                    $dir = dir($dir_images);

                    while (($archivo = $dir->read()) !=false){
                        if ($archivo != 'pc1.png' && stropos($archivo, 'png'||strpos($archivo, 'png'))) {
                            $images = $dir_images.$archivo;
                            $images[]= $dir_images.$archivo;
                        }
                    }
                    $dir->close();
                } else {
                    echo "No se encontraron productos.";
                    exit;
                }
            } else {
                echo "Producto no encontrado o no activo.";
                exit;
            }
        } else {
            echo "No se pudo establecer la conexión con la base de datos.";
            exit;
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rave-Tech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="acceso/styles/style.css">
</head>
<body>
    <div id="pagina" class="site">
        <header class="header">
            <div class="menu container">
                <a href="#" class="logo">Logo</a>
                <input type="checkbox" id="menu"/>
                <label for="menu"><img src="images/menu.png" class="menu-icono" alt=""></label>
                <nav class="navbar">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>                        
                        <li><a href="#">Productos</a></li>                        
                        <li><a href="#">Contacto</a></li>                        
                    </ul>
                </nav>
                <div> 
                    <ul class="container-user">
                        <li>
                            <a href="registro.php"><img src="acceso/svg/user-line.svg" id="img-registro" width="25" alt=""></a>
                        </li>
                        <li class="submenu">
                            <img src="acceso/svg/shopping-cart-line.svg" id="img-carrito" alt="" width="25">
                            <div id="carrito">
                                <table id="lista-carrito">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar_carrito" class="btn-3">Vaciar carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">
                        <img src="images/1/pc1.png" alt="">
                    </div>
                    <div class="col-md-6 order-md-2">
                        <h2><?php echo htmlspecialchars($nombre); ?></h2>
                        <h2><?php echo htmlspecialchars(MONEDA . number_format($precio, 2, '.', '.')); ?></h2>
                        <p class="lead"><?php echo htmlspecialchars($descripcion); ?></p>
                    </div>
                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn-1" type="button">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer container">
            <div class="link">
                <h3>Lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>Lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>Lorem</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="acceso/js/scrip.js"></script>
</body>
</html>
