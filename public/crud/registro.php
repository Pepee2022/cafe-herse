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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rfc = $_POST['rfc'];

if (empty($_POST['id_usuario']) || empty($_POST['contrasena']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['direccion']) || empty($_POST['email']) || empty($_POST['telefono'])) {
    die("Todos los campos son obligatorios. Por favor, complete el formulario.");
}

// Consulta para verificar las credenciales del usuario
$sql = "INSERT INTO clientes (id_usuario, contrasena, nombre, apellido, direccion, email, telefono, rfc)
VALUES ('$IdUsuario', '$contrasena', '$nombre', '$apellido', '$direccion', '$email', '$telefono', '$rfc');";
$result = $conexion->query($sql);

if ($result) {
    // Registro exitoso, mostrar aviso de inicio de sesión
    echo "<script>alert('Registro exitoso.');</script>";
    header("Location: ../login.php");
} else {
    // Si hay un error en la consulta, mostrar un mensaje de error
    echo "Error en el registro: " . $conexion->error;
}

$conexion->close();
?>