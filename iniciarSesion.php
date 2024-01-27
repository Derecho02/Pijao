<?php
session_start();

include('conexion.php');

$errorMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = $_POST['password'];

    $verificarUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $verificarUsuario);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        if (password_verify($password, $fila['password'])) {
            $_SESSION['usuario'] = $usuario;

            if ($fila['es_administrador']) {
                $_SESSION['es_administrador'] = true;
                header("Location: paginaAdministrador.php");
            } else {
                header("Location: index.php");
            }

            exit();
        } else {
            $errorMensaje = "Contraseña incorrecta";
        }
    } else {
        $errorMensaje = "Usuario no encontrado";
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body class="bg-light">
<header>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme= "dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">
                    <img src="assets/Imagenes/LogoPijaoSinFondo.png" class="navbar-logo" alt="Pijao sin Fondo" style="max-width: 50px;">
                  </a>
                  <!-- <img src="Imagenes/LogoPijaoSinFondo.png" class="img-fluid navbar-logo" alt="Pijao sin Fondo" > -->
                  <!-- <a class="navbar-brand" href="#">El Pijao</a> -->
                  <!-- Codigo para que funcione en dispositivos mobiles -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Prueb.php">Productos</a>
                      </li>
                      <!-- Desplegable -->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Paginas/servicios.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Servicios
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="Paginas/Maquinaria y equipo.html">Maquinaria y Equipo</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="Paginas/proyectos.html">Proyectos</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="paginas/Sobre Nosotros.html">Sobre Nosotros</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="paginas/Contactenos.html">Contáctenos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="iniciarSesion.php">Iniciar Sesion</a>
                      </li>
                    </ul>
                    <!-- Por si se quiere agregar el de busqueda
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                  </div>
                </div>
              </nav>
        </div>
    </header>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card p-4">
        <h2 class="mb-4 text-center">Iniciar Sesión</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <?php if (!empty($errorMensaje)) { ?>
                <div class="alert alert-danger" role="alert"><?php echo $errorMensaje; ?></div>
            <?php } ?>
            <br>
        <div Class="text-center">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        </div>       
        <p class="mt-3">¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a></p>
    </div>
</div>

<div class="separador my-3">
      <hr>
    </div>

<footer class="text-center text-black footer-margin">
    <section>
      <div class="footer-container">
        <div class="footer-column">
            <p>Ingeniería y Minerales el Pijao</p>
            <p>NIT: 901390186-1</p>
            <p>Dirección: Km 4 Payandé-San Luis (Tolima)</p>
        </div>
        <div class="footer-column">
            <p>Teléfono: +57 3106866485</p>
            <p>E-mail: informacion@elpijao.com</p>
            <p>Web: www.elpijao.com</p>
        </div>
        <div class="footer-column">
            <p>Síguenos:</p>
            <div class="redes-sociales">
              <a href="#" target="_blank">
                <img src="assets/Imagenes/Icono Facebook.png" alt="Facebook" class="icono-red-social">
              </a>
              <a href="·" target="_blank">
                <img src="assets/Imagenes/Icono Instagram.png" alt="Instagram" class="icono-red-social">
              </a>
            </div>
        </div>
    </div>
    <div class="separador my-3">
      <hr>
    </div>
    </section>
        <p>Copyright © 2023 : : Ingenieria y Minerales El Pijao S.A.S</p>
   </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
