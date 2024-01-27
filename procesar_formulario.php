<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $comentario = $_POST['comentario'];

    $conexion = new mysqli('localhost', 'root', '', 'pijao');

    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    $sql = "INSERT INTO datos_contactenos (nombre, correo, telefono, comentario) VALUES ('$nombre', '$correo', '$telefono', '$comentario')";

    if ($conexion->query($sql) === TRUE) {
        $respuesta = ['success' => true, 'message' => 'Datos enviados correctamente'];
    } else {
        $respuesta = ['success' => false, 'message' => 'Error al enviar datos: ' . $conexion->error];
    }

    $conexion->close();

    header('Content-Type: application/json');
    echo json_encode($respuesta);
} else {

    echo 'Acceso no permitido';
}

?>
