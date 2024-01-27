<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "pijao";

$conexion = mysqli_connect($servidor, $usuario, $password, $db);

// Verificar la conexión
if (isset($_GET['mostrar_mensaje']) && $_GET['mostrar_mensaje'] == 'true') {
    echo "Conexión exitosa con la base de datos";
}
?>

