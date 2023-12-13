<?php
session_start();

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "ventas";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$IdUsuario = $_POST['id_usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM clientes WHERE id_usuario = '$IdUsuario'";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['contrasena'];
    if ($contrasena == $hashedPassword) {
        // Guardar información del usuario en la sesión
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['direccion'] = $row['direccion'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['rfc'] = $row['rfc'];
        // Redirigir a la página principal
        header("Location: ../index.php");
        exit();
    } else {
        echo "Credenciales incorrectas. <a href='../login.php'>Volver a intentar</a>";
    }
} else {
    echo "No se pudo validar. <a href='../login.php'>Volver a intentar</a>";
}

$conexion->close();
?>