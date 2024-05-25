<?php
require "./procesos/config.php";
require "./conexion.php";
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
            $sql->bind_param("s", $id);
            $sql->execute();
            $result = $sql->get_result();
            if ($result->num_rows > 0) {
                $sql = $conection->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id = ? AND activo = 1 LIMIT 1");
                $sql->bind_param("s", $id);
                $sql->execute();
                $result = $sql->get_result();
                $row = $result->fetch_assoc();
                if ($row) {
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $precio = $row['precio'];
                    $descuento = $row['descuento'];
                    $precio_desc = $precio-(($precio*$descuento)/100);
                    $dir_images = 'images/'.$id.'/';

                    $rutaImg = $dir_images. 'pc1.png';
                    
                    if (!file_exists($rutaImg)) {
                        $rutaImg = 'images/descarga.png';
                    }
                    $imagenes = array();
                    $dir = dir($dir_images);

                    while (($archivo = $dir->read())!=false) {
                        if ($archivo!='pc1.png'&& (strpos($archivo, 'png')||strpos($archivo,'png'))) {
                            $imagenes[] = $dir_images.$archivo;
                        }
                    }
                    $dir-> close();
                }
            }
        }
        else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        <a href="./procesos/carrito.php"><img src="acceso/svg/shopping-cart-line.svg" 
                        width="25" alt=""><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="<?php echo $rutaImg?>" alt="" class="d-block w-100">
                        </div>
                        <?php foreach ($imagenes as $img){ ?>
                            <div class="carousel-item">
                                <img src="<?php echo $img?>" class="d-block w-100">
                            </div>  
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" data-bs-target="#carouselImages" type="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#carouselImages" type="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </button>
                    </div>
                    </div>
                    <div class="col-md-6 order-md-2">
                        <h2><?php echo htmlspecialchars($nombre); ?></h2>
                        <?php if ($descuento > 0) { ?>
                            <p><del><?php echo htmlspecialchars(MONEDA. number_format($precio, 2, '.', '.')); ?></del></p>
                            <h2>
                                <?php echo htmlspecialchars(MONEDA. number_format($precio_desc, 2, '.', '.')); ?>
                                <small class="text-succes"><?php echo htmlspecialchars($descuento); ?>% descuento</small>
                            </h2>
                            <?php } else { ?>
                           <h2><?php echo htmlspecialchars(MONEDA . number_format($precio, 2, '.', '.')); ?></h2>
                            <?php } ?>

                        <p class="lead"><?php echo $descripcion; ?></p>
                        <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn-1" type="button" onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Agregar al carrito</button>
                    </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
     crossorigin="anonymous"></script>
    <script>
        function addProducto(id, token){
            let url = '../procesos/carrito.php'
            let formData = new FormData ()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url,{
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=>{
                if (data.ok) {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>
</body>
</html>
