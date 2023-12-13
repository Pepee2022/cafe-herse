<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herse</title>

    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ventas";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta a la base de datos
$sqlProductos = "SELECT a.*, i.ruta AS ruta_imagen FROM articulos a INNER JOIN imagenes i ON a.id_imagen = i.id_imagen";
$resultProductos = $conn->query($sqlProductos);
$sqlCategorias = "SELECT * FROM categorias";
$resultCategorias = $conn->query($sqlCategorias);

// Cerrar la conexión (importante cerrarla cuando ya no la necesites)
$conn->close();
?>
    <!--header section starts-->
    <header class="header">
        <a href="" class="logo"> <i class="fa-solid fa-mug-saucer fa-fade"></i>Herse</a>
        
        <nav class="navbar">
            <a href="#home">Inicio</a>
            <a href="#features">Valores</a>
            <a href="#productos">Productos</a>
            <a href="#categorias">Categorías</a>
            <a href="#review">Contáctanos</a>
            <!--<a href="#blogs">Blogs</a>-->
        </nav>
        
        <div class="icons">
            <div class="fa-solid fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn cart-counter"> 0 </div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <form action=""class="search-form">
            <input type="search" id="search-box" placeholder="buscar aquí...">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="login.php" method="post" class="login-form">
            <div id="user-info-container"></div>
            <?php require_once "crud/sesionValida.php"; ?>
        </form>
    </header>
    <!--header section ends-->

<!--Sección de home- INICIO-->
<section class="home" id="home">
    <div class="content">
        <h3>Lo mejor del <span>Café</span> orgánico</h3>
        <p>El producto que HERSE E.I.R.L ofrece es café orgánico puro, elaborado bajo los más altos estándares de calidad y materias primas certificadas, asegurando así al consumidor un producto fresco a base de insumos naturales</p>
    </div>

</section>
<!--Sección de home- FIN-->

<!--Sección de features -INICIO-->
<SECTION class="features" id="features">
    <h1 class="heading">Nuestros <span>valores</span></h1>
    <div class="box-container">
       <div class="box">
            <img src="img/seguridad.png" alt="">
            <h3>Seguridad</h3>
            <p>Nuestros procesos de envasado y empaquetado cuentan con 
                las más altas normas y exigencias que se requieren para evitar 
                situaciones inesperadas.</p>

        </div> 

        <div class="box">
            <img src="img/calidad.png" alt="">
            <h3>Calidad</h3>
            <p>Este punto radica desde la perfección en la siembra del café, la cosecha, la selección, el tueste y el empaque hasta lainnovación en la ejecución de los productos para que el cliente
                siempre tenga lo mejor</p>
        </div> 

        <div class="box">
            <img src="img/compromiso.png" alt="">
            <h3>Compromiso  </h3>
            <p>Con nuestro país, con los clientes, con nosotros mismos ya que tenemos una gran responsabilidad</p>
        </div> 


    </div>
</SECTION>
<!--Sección de features -FIN-->

<!--Sección de productos -INICIO-->
<section class="productos" id="productos">
    <h1 class="heading">Nuestros <span>productos</span></h1>
    <div class="swiper productos-slider">
        <div class="swiper-wrapper">  
            <?php
                // Mostrar resultados de productos en un bucle
                while ($rowProducto = $resultProductos->fetch_assoc()) {
                    // Obtener la ruta de la imagen desde la base de datos
                    $imgRuta = $rowProducto['ruta_imagen'];
                    $posicionArchivos = strpos($imgRuta, 'archivos');
                    $imgRuta = substr($imgRuta, $posicionArchivos);
                    // Mostrar la imagen con un tamaño específico
                    echo '<div class="swiper-slide box">';
                    echo '<img width="200" height="160" src="admin/' . $imgRuta . '" alt="No sale la imagen :v">';
                    echo '<h3>' . $rowProducto['nombre'] . '</h3>';
                    echo '<p>' . $rowProducto['descripcion'] . '</p>';
                    echo '<div class="price">$' . $rowProducto['precio'] . '</div>';
                    // Agrega el resto de la información según tu estructura HTML
                    echo '<button class="btn add-to-cart-btn" data-nombre="'. $rowProducto['nombre'] .'" data-precio="'. $rowProducto['precio'] .'">Agregar al carrito</button>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</section>

<!--Sección de productos -FIN-->

<!--Sección de categorias -INICIO-->
<section class="categorias" id="categorias">
    <h1 class="heading">Nuestras <span>categorías</span></h1>
    <div class="box-container">
        
        <?php
        // Mostrar resultados de categorías en un bucle
        while($rowCategoria = $resultCategorias->fetch_assoc()) {
        ?>
            <div class="box">
                <!-- Puedes utilizar la misma lógica para la ruta de la imagen según tu estructura de archivos -->
                <img src="img/categoria.png" alt="">
                <h3><?php echo $rowCategoria['nombreCategoria']; ?></h3>
                <!-- Puedes ajustar el contenido según tus necesidades -->
                <button>Más información</button>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<!--Sección de categorias -FIN-->

<!-- Footer section starts -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <i class="fa-solid fa-mug-saucer fa-fade"></i>Herse
        </div>

        <div class="row">
                    <div class="col-md-6">
                        <P>UBícanos en calle Almagro 405, al costado del panteón</P>
                    </div>

                    <div class="col-md-6">
                        <p>Llámanos al 921090813</p>
                    </div>
        </div>

        <div class="row">
				<div class="col-md-6">
					<h3 class="text-center">
						Cafetería Herse®. Calidad y encanto
					</h3>
				</div>
				<div class="col-md-6">
					<h3 class="text-center text-info">
                        Todos los derechos revervados.
					</h3>
				</div>
			</div>


        <div class="footer-social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
        </div>
    </div>
</footer>
<!-- Footer section ends -->

<div class="cart-popup" id="cart-popup">
    <div class="cart-content">
        <span class="close-btn" onclick="closeCartPopup()">&times;</span>
        <!-- Aquí mostrarás los productos del carrito -->
        <h2>Carrito de Compras</h2>
        <div id="cart-items"></div>
        <div class="cart-total">
            <p>Total: $<span id="cart-total">0.00</span></p>
        </div>
        <button onclick="checkout()">Pagar</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--font awesome cdn link-->
    <script src="js/script.js"></script>

</body>
</html>