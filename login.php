<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body{
            background-image: url(img/fondo.jpeg); /*Fondo del login*/
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="crud/validar.php" method="post" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Nombre de Usuario" name="id_usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button id="entrarSistema">Entrar</button>
                        <br>
                        <br>
                        <a href="admin/index.php" style="font-size: 0.8em; color: #3d2b1f;">Soy administrador</a>
                    </form>
                    <!--Register-->
                    <form action="crud/registro.php" method="post" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre de Usuario" name="id_usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <input type="text" placeholder="Nombres" name="nombre">
                        <input type="text" placeholder="Apellidos" name="apellido">
                        <input type="email" placeholder="Correo" name="email">
                        <input type="text" placeholder="Dirección" name="direccion">
                        <input type="text" placeholder="Teléfono" name="telefono">
                        <input type="text" placeholder="RFC" name="rfc">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="js/formato.js"></script>
</body>
</html>