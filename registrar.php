<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener valores del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Verificar si el usuario ya existe
    $verificarUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $verificarUsuario);

    if (mysqli_num_rows($resultado) > 0) {
        // El usuario ya existe, error
        die("Error: El usuario ya está registrado. <a href='registro.html'>Volver al registro</a>");
    }

    // Si el usuario no existe, se agrega a la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, usuario, telefono, password) VALUES ('$nombre', '$email', '$usuario', '$telefono', '$password')";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro exitoso. <a href='iniciarSesion.php'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

