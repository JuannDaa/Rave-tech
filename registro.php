
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--css -->
    <link rel="stylesheet" href="acceso/styles/styles.css">
</head>
<body>
    <div class="login">
        <div class="contenedor">
            <div class="login_img">
                <img src="acceso/svg/img-login.svg" alt="">
            </div>

            <div class="login_forms">
                <form action="./procesos/ingreso.php" class="login_registre" id="login_in" method="post">
                    <h1 class="login_titulo">Iniciar sesión</h1>

                    <div class="login_box">
                        <img src="acceso/svg/user-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Correo electrónico" name="correo" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="acceso/svg/lock-fill.svg" alt="" width="16">
                        <input type="password" placeholder="Contraseña" name="contrasena" class="login_input">
                    </div>

                    <a href="#" class="login_forgot">¿Ha olvidado su contraseña?</a>
                    <input type="submit" value="Iniciar sesión" class="login_button">

                    <div>
                        <span class="login_cuenta">¿No tienes una cuenta?</span>
                        <span  class="login_registro" id="sign_up"> Registrarse </span>
                    </div>

                </form>

                <form action="procesos/registro.php" class="login_create none" id="login_up" method="post">
                    <h1 class="login_titulo">Crear cuenta</h1>
    
                    <div class="login_box">
                        <img src="user-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Nombre" name="nombre" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="user-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Apellido" name="apellido" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="user-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Teléfono" name="telefono" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="user-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Correo electrónico" name="correo" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="lock-fill.svg" alt="" width="16">
                        <input type="password" placeholder="Contraseña" name="contrasena" class="login_input">
                    </div>

                    <div class="login_box">
                        <img src="lock-fill.svg" alt="" width="16">
                        <input type="text" placeholder="Dirección" name="direccion" class="login_input">
                    </div>

                    <input type="submit" value="Registrarse" class="login_button">

                    <div>
                        <span class="login_cuenta">¿Ya tiene una cuenta?</span>
                        <span class="login_registro" id="sign_in">Iniciar sesión</span>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- script -->
    <script src="acceso/js/script.js"></script>
</body>
</html>
