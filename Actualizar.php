<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario']) || !isset($_SESSION['es_administrador']) || !$_SESSION['es_administrador']) {
    header("Location: index.php");
    exit();
}

// Manejar la actualización del producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = mysqli_real_escape_string($conexion, $_POST['producto_id']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);

    // Procesar la imagen (si se desea actualizar)
    if ($_FILES['imagen']['size'] > 0) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        // Carpeta donde se guardarán las imágenes
        $carpeta_destino = "assets/Imagenes/";

        // Generar un nombre único para la imagen
        $imagen_nombre_unico = uniqid() . "_" . $imagen_nombre;

        // Ruta completa donde se guardará la imagen
        $ruta_imagen = $carpeta_destino . $imagen_nombre_unico;

        // Mover la imagen al directorio de destino
        move_uploaded_file($imagen_temporal, $ruta_imagen);

        // Actualizar el producto con la nueva imagen
        $sql_update = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', imagen='$ruta_imagen', precio=$precio WHERE id_producto=$producto_id";
    } else {
        // Actualizar el producto sin cambiar la imagen
        $sql_update = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio WHERE id_producto=$producto_id";
    }

    if (mysqli_query($conexion, $sql_update)) {
        $mensaje = "Producto actualizado exitosamente.";
        // Redirigir a la página del administrador
        header("Location: paginaAdministrador.php");
        exit(); 
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
