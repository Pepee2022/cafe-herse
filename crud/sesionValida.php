<?php
	session_start();
	if(isset($_SESSION['nombre'])){
?>
<h2>Bienvenido: <?php echo $_SESSION['nombre']; ?></h2>
<h1></h1>
<a class="btn add-to-cart-btn" href="crud/cerrarSesion.php">Cerrar sesión</a>
<?php 
    }else{
        echo '<button class="btn add-to-cart-btn">Iniciar Sesión</button>';
    }
?>