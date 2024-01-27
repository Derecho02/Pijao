<?php
include('conexion.php');

// Verificacion de formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);

    // Procesar la imagen
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

    // Insertar el nuevo producto en la base de datos
    $sql_insert = "INSERT INTO productos (nombre, descripcion, imagen, precio) VALUES ('$nombre', '$descripcion', '$ruta_imagen', $precio)";

    if (mysqli_query($conexion, $sql_insert)) {
        $mensaje = "Producto creado exitosamente.";
        // Redirigir a la página del administrador
        header("Location: paginaAdministrador.php");
        exit(); // Asegurar que se detenga la ejecución después de la redirección
    } else {
        $mensaje = "Error al crear el producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

