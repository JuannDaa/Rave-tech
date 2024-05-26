<?php
require "./procesos/config.php";
require "./conexion.php";
$conection = conexion::conectar();

$productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos']:null;

$sql = $conection->prepare("SELECT * FROM productos WHERE id = ?");

if ($productos != null) {
    foreach ($productos as $id_producto => $cantidad) {
        $sql->bind_param('i', $id_producto);
        $sql->execute();
        $result = $sql->get_result();
        $lista_carrito[] = $result->fetch_assoc();
    }
}

if ($conection) {
    
    if ($sql) {
        $sql->execute();
        $resultado = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error en la preparación de la consulta: " . $conection->error;
    }
} else {
    echo "No se pudo establecer la conexión con la base de datos.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<!-- #pagina.site>header+main+footer crea el div con el header, menu y footer asi con otros-->
<!-- .header.top>.container>.wrapper.flexitem>.left+.right (Se utiliza para crear varios div con su clase prestablecidad)-->
<body>
    <div id="pagina" class="site">
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Logo</a>
            <input type="checkbox" id="menu"/>
            <label for="menu"><img src="images/menu.png" class="menu-icono" alt=""></label>
            <nav class="navbar">
                    <ul>
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>                        
                        <li><a href="#">Productos</a></li>                        
                        <li><a href="./nosotros.php">Contacto</a></li>                        
                    </ul>
            </nav>
            
            <div> 
                <ul class="container-user">
                    <li>
                        <a href="./registro.php"><img src="acceso/svg/user-line.svg" id="img-registro" width="25" alt=""></a>
                    </li>
                    <li>
                        <a href="./checkout.php"><img src="acceso/svg/shopping-cart-line.svg" 
                        width="25" alt=""><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
        <!-- Header -->
        <!-- main (Menu) -->
       <main>
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php if ($lista_carrito == null) {
                                echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                            } else {
                                $total = 0;
                                foreach ($lista_carrito as $producto) {
                                    $_id = $producto['id'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio'];
                                    $descuento = $producto['descuento'];
                                    $precio_desc = $precio -(($precio*$descuento)/100);
                                    $subtotal = $cantidad*$precio_desc;
                                    $total += $subtotal;
                                 ?>

                            <tr>
                                <td><?php echo $nombre?></td>
                                <td><?php echo MONEDA.number_format($precio_desc,2,'.',',');?></td>
                                <td>
                                    <input type="number" min="1" max="10" step="1" value="<?php 
                                    echo $cantidad ?>"size="5"id="cantidad_<?php echo $_id;?>"onchange="">
                                </td>
                                <td>
                                    <div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA.
                                    number_format($subtotal,2,".",",");?></div>
                                </td>
                                <td>
                                    <a   id="eliminar" class="btn btn-warning btn-sm" data-bs-id="
                                    <?php echo $_id;?>"data-ds-toogle="modal" data-bs-target="eliminaModal">Eliminar</a>
                                </td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">
                                    <p class="h3"id="total"><?php echo MONEDA.number_format
                                    ($total,2,'.',',')?></p>
                                </td>
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-5 offset-md-7 d-grip gap-2">
                        <button class="btn-1">Realizar pago</button>
                    </div>
                </div>
            </div>
       </main> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="acceso/js/scrip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
