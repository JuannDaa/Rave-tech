<?php
require "procesos/config.php";
require "conexion.php";
$conection = conexion::conectar();

if ($conection) {
    $sql = $conection->prepare("SELECT id, nombre, descripcion, precio FROM productos WHERE activo=1");
    
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
        <div class="header-content container">
            <div class="swiper mySwiper-1">
                <div class="swiper-wrapper">
                <?php foreach ($resultado as $row){?>
                    <div class="swiper-slide">
                       <div class="header-info">
                            <div class="header-txt">
                                <?php
                                $id = $row['id'];
                                $imagen = "images/".$id."/pc1.png";

                                if (!file_exists($imagen)) {
                                    $imagen = "images/descarga.png";
                                }

                                 ?>
                                <h1><?php echo $row['nombre'];?></h1>
                                <div class="prices">
                                    <p class="price-1"><?php echo number_format($row['precio'],2,'.','.');?></p>
                                    <p class="price-2">3.050.000</p>
                                </div>
                                <a href="details.php?id=<?php echo $row['id'];?>&token<?php echo
                                hash_hmac('sha1',$row['id'],KEY_TOKEN);?>" class="btn-1">Información</a>
                            </div>    
                            <div class="header-img">
                                <img src="<?php echo $imagen;?>" alt="">
                            </div>
                        </div> 
                    </div>
                    <?php }?>
<!--Borrar -->
                    <div class="swiper-slide">
                        <div class="header-info">
                            <div class="header-txt">
                                <h1>Portátil ACER Nitro 5 AN515</h1>
                                <h3>Core i5-10300H, RAM 8GB, SSD 512GB, GTX 1650 4GB, 15,6 FHD</h3>
                                <div class="prices">
                                    <p class="price-1">3.400.000</p>
                                    <p class="price-2">3.200.000</p>
                                </div>
                                <a href="#" class="btn-1">Información</a>
                            </div>
                            <div class="header-img">
                                <img src="images/pc2.png" alt="">
                            </div>
                        </div> 
                    </div>
                    <div class="swiper-slide">
                        <div class="header-info">
                            <div class="header-txt">
                                <h1>Portatil MSI GP76 Leopard</h1>
                                <h3>Intel Core i7 11800H RAM 16GB SSD 1TB RTX 3070 8GB</h3>
                                <div class="prices">
                                    <p class="price-1">10,980,000</p>
                                    <p class="price-2">10.800.000</p>
                                </div>
                                <a href="#" class="btn-1">Información</a>
                            </div>
                            <div class="header-img">
                                <img src="images/pc3.png" alt="">
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                
            </div>
        </div>

    </header>
        <!-- Header -->
        <!-- main (Menu) -->
       <section class="promos container" id="lista-1">
        <h2>Promociones</h2>
        <div class="categories">

            <div class="categorie">
                <div class="categorie-1">
                    <h3>Promo 1</h3>
                    <div class="prices">
                        <p class="price-1">Poner precio</p>
                        <p class="precio">Poner precio</p>
                    </div>
                    <a href="#" class="agregar-carrito btn-3" data-id="1">Agregar</a>
                </div>
                <div class="categorie-img">
                    <img src="images/ph1.png" alt="">
                </div>
            </div>
<!-- Esto toca borrarlo  -->
            <div class="categorie">
                <div class="categorie-1">
                    <h3>Promo 2</h3>
                    <div class="prices">
                        <p class="price-1">Poner precio</p>
                        <p class="precio">Poner precio</p>
                    </div>
                    <a href="#" class="agregar-carrito btn-3" data-id="2">Agregar</a>
                </div>
                <div class="categorie-img">
                    <img src="images/ph2.png" alt="">
                </div>
            </div>

            <div class="categorie">
                <div class="categorie-1">
                    <h3>Promo 3</h3>
                    <div class="prices">
                        <p class="price-1">Poner precio</p>
                        <p class="precio">Poner precio</p>
                    </div>
                    <a href="#" class="agregar-carrito btn-3" data-id="3">Agregar</a>
                </div>
                <div class="categorie-img">
                    <img src="images/ph3.png" alt="">
                </div>
            </div>

            <div class="categorie">
                <div class="categorie-1">
                    <h3>Promo 4</h3>
                    <div class="prices">
                        <p class="price-1">Poner precio</p>
                        <p class="precio">Poner precio</p>
                    </div>
                    <a href="#" class="agregar-carrito btn-3" data-id="4">Agregar</a>
                </div>
                <div class="categorie-img">
                    <img src="images/ph4.png" alt="">
                </div>
            </div>


        </div>

       </section>

       <hr>

       <section class="products container" id="lista-2">

        <h2>Nuevos Productos</h2>
            <div class="swiper mySwiper-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph5.png" alt="">
                            <div class="product-txt">
                                <h3>Auriculares Astro A10</h3>
                                <p>Para Xbox One</p>
                                <p class="precio">300.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="5">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product"    >
                            <img src="images/ph6.png" alt="">
                            <div class="product-txt">
                                <h3>Monitor Gaming LG </h3>
                                <p>LG 27GP850-B 165Hz, 1ms</p>
                                <p class="precio">1.000.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="6">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph7.png" alt="">
                            <div class="product-txt">
                                <h3>Monitor ASUS </h3>
                                <p>VP228HE, 60Hz, FHD 22"</p>
                                <p class="precio">540.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="7">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph8.png" alt="">
                            <div class="product-txt">
                                <h3>Auriculares Logitech</h3>
                                <p>G332 con micrófono</p>
                                <p class="precio">420.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="8">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

       </section>
       <hr>
       <section class="products container" id="lista-3">

        <h2>Productos</h2>
            <div class="swiper mySwiper-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph9.png" alt="">
                            <div class="product-txt">
                                <h3>Chasis XPG</h3>
                                <p>Battlecruiser</p>
                                <p class="precio">750.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="9">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph10.png" alt="">
                            <div class="product-txt">
                                <h3>Chasis XPG Starker</h3>
                                <p>Midtower</p>
                                <p class="precio">600.000</p>
                                <a href="#" class="agrega-carrito btn-3" data-id="10">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph11.png" alt="">
                            <div class="product-txt">
                                <h3>Chasis Corsair</h3>
                                <p>iCue 220T</p>
                                <p class="precio">450.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="11">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product">
                            <img src="images/ph8.png" alt="">
                            <div class="product-txt">
                                <h3>Auriculares Logitech</h3>
                                <p>G332 Estéreo con micrófono</p>
                                <p class="precio">420.000</p>
                                <a href="#" class="agregar-carrito btn-3" data-id="12">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

       </section>
       <!-- footer (pie de pagina) -->
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

                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>Lorem</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                </p>
            </div>

        </footer>   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="acceso/js/scrip.js"></script>
</body>
</html>
