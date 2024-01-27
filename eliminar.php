<?php
session_start();
include('conexion.php');

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['es_administrador']) || !$_SESSION['es_administrador']) {
    header("Location: index.php");
    exit();
}

// Verificar si se ha enviado el formulario de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreEliminar = mysqli_real_escape_string($conexion, $_POST['nombreEliminar']);

    // Consultar si el producto existe
    $sql_select = "SELECT id_producto FROM productos WHERE nombre = '$nombreEliminar'";
    $resultado = mysqli_query($conexion, $sql_select);

    if ($resultado->num_rows > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $idEliminar = $row['id_producto'];

        // El producto existe, proceder a eliminar
        $sql_delete = "DELETE FROM productos WHERE id_producto = $idEliminar";

        if (mysqli_query($conexion, $sql_delete)) {
            $mensaje = "Producto actualizado exitosamente.";
        // Redirigir a la página del administrador
        header("Location: paginaAdministrador.php");
        exit(); 
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conexion);
        }
    } else {
        echo "No se encontró un producto con ese nombre.";
    }
}

mysqli_close($conexion);
?>
