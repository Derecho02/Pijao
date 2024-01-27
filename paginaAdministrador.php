<?php
session_start();
include('conexion.php');

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['es_administrador']) || !$_SESSION['es_administrador']) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="assets/css/estilos.css" />
    <link rel="stylesheet" href="assets/css/estilosAdministrador.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>

<?php
echo "<p>Bienvenido, " . $_SESSION['usuario'] . "!</p>";
echo "<p>Eres un administrador.</p>";
echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
?>

<div class="container">

    <!-- Sección de Crear Producto -->
    <div class="section-container">
        <h2>Crear Producto</h2>
        <form action="crear.php" method="POST" enctype="multipart/form-data">
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" class="form-control" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" required>

            <button type="submit" class="btn btn-primary">Crear Producto</button>
        </form>
    </div>
    
    <div class="separador">
        <hr>
    </div>

    <!-- Sección de Actualizar Producto -->
    <div class="section-container">
        <h2>Actualizar Producto</h2>
        <form action="actualizar.php" method="POST" enctype="multipart/form-data">
            
            <label for="producto_id">Seleccionar Producto:</label>
            <select name="producto_id" class="form-control">
                <?php

                // Obtener la lista de productos desde la base de datos
                $sql_select_productos = "SELECT id_producto, nombre FROM productos";
                $result = mysqli_query($conexion, $sql_select_productos);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id_producto']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
            <br>
            <br>

            <label for="nombre">Nuevo Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>

            <label for="descripcion">Nueva Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>

            <label for="imagen">Nueva Imagen (opcional):</label>
            <input type="file" name="imagen" class="form-control">

            <label for="precio">Nuevo Precio:</label>
            <input type="number" name="precio" class="form-control" required>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>

    <div class="separador">
        <hr>
    </div>

    <!-- Sección de Eliminar Producto -->
    <div class="section-container">
    <h2>Eliminar Producto</h2>
    <form action="eliminar.php" method="POST">
        <label for="nombreEliminar">Seleccione el Producto a Eliminar:</label>
        <select name="nombreEliminar" class="form-control" required>
            <?php
            // Consultar los productos existentes
            $sql_select = "SELECT id_producto, nombre FROM productos";
            $resultado = mysqli_query($conexion, $sql_select);

            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-danger">Eliminar Producto</button>
    </form>
</div>

<!-- Sección de Buscar Productos -->
<div class="section-container">
    <h2>Buscar Productos</h2>

    <form action="" method="POST">
        <label for="productoSeleccionado">Selecciona un Producto:</label>
        <select name="productoSeleccionado" id="productoSeleccionado">
            <?php

            $sql_select_nombres = "SELECT nombre FROM productos";
            $result_nombres = mysqli_query($conexion, $sql_select_nombres);

            while ($row_nombre = mysqli_fetch_assoc($result_nombres)) {
                echo "<option value='" . $row_nombre['nombre'] . "'>" . $row_nombre['nombre'] . "</option>";
            }

            mysqli_close($conexion);
            ?>
        </select>

        <button type="submit" name="buscarProducto">Buscar</button>
    </form>

    <?php
    // Procesar el formulario al enviarlo
    if (isset($_POST['buscarProducto'])) {
        // Obtener el nombre seleccionado
        $nombreSeleccionado = $_POST['productoSeleccionado'];

        // Consultar los detalles del producto seleccionado
        include('conexion.php');
        $sql_select_producto = "SELECT * FROM productos WHERE nombre = '$nombreSeleccionado'";
        $result_producto = mysqli_query($conexion, $sql_select_producto);

        // Mostrar los detalles del producto
        echo "<h3>Detalles del Producto: $nombreSeleccionado</h3>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>";

        while ($row_producto = mysqli_fetch_assoc($result_producto)) {
            echo "<tr>
                    <td>" . $row_producto['id_producto'] . "</td>
                    <td>" . $row_producto['nombre'] . "</td>
                    <td>" . $row_producto['descripcion'] . "</td>
                    <td>" . $row_producto['precio'] . "</td>
                </tr>";
        }
        echo "</table>";
        mysqli_close($conexion);
    }
    ?>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
