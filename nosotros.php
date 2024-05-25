<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="acceso/styles/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/79e6024c63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" /> 
</head>

<body>
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
    <section id="about-us">
      <h2>Acerca de nosotros</h2>
      <p>Somos una tienda en línea especializada en la venta de productos de calidad a precios accesibles. Nuestra misión es ofrecer una experiencia de compra fácil, segura y satisfactoria a nuestros clientes, y ayudarlos a encontrar los productos que necesitan para mejorar su calidad de vida.</p>
      <h3>Nuestra tienda en línea</h3>
      <p>Nuestra tienda en línea ofrece una amplia variedad de productos, desde electrónica y tecnología hasta moda y accesorios. Nuestro sistema de pago y envío es seguro y confiable, y ofrecemos una garantía de devolución de dinero en caso de que no estés satisfecho con tu compra.</p>
      <h3>Nuestras tiendas físicas</h3>
      <p>Tenemos varias tiendas físicas en diferentes ciudades, donde puedes encontrar los mismos productos que en nuestra tienda en línea. Nuestros horarios de atención son de lunes a viernes de 10:00 a 20:00, y sábados de 10:00 a 14:00. Aquí tienes una lista de nuestras tiendas físicas:</p>
      <ul>
        <li><strong>Tienda 1:</strong> Centro regional soacha</li>
      </ul>
      <p>Si tienes alguna pregunta o sugerencia, no dudes en contactarnos a través de nuestro formulario de contacto. Estaremos encantados de ayudarte.</p>
    </section>
</header>
<div id="map">
    <div id="map--container"></div>
</div>
<footer>

</footer>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="./acceso/js/script_mapa.js"></script> 
</body>
</html>