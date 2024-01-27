<?php
session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
  <body>

  <a class="whatsapp-button" href="https://api.whatsapp.com/send?phone=3125778232&text=¡Hola! Estoy interesado en sus productos y servicios." target="_blank">
        <img class="whatsapp-icon" src="assets/Imagenes/Icono Whatsapp.png" alt="WhatsApp Icon">
    </a>
  
  <?php
if (isset($_SESSION['usuario'])) {
    echo "<p>Bienvenido, " . $_SESSION['usuario'] . "!</p>";
    echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    echo '<a href="login.php">Iniciar Sesión</a>';
}
?>
    <!-- Barra de navegacion -->
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
                        <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
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
                          <li><a class="dropdown-item" href="paginas/Maquinaria y equipo.html">Maquinaria y Equipo</a></li>
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
                        <a class="nav-link" href="iniciarSesion.php">Iniciar Sesión</a>
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
    <!-- Imagen de Carrusel -->
    <section class="carrousel">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/Imagenes/Prueba 1.jpg" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Minerales de Alta Calidad</h2>
                  <p>Creados por la tierra, perfeccionados por la ciencia.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/Imagenes/Prueba 2.jpg" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Gestion de Riesgos</h2>
                  <p>donde la anticipación se convierte en seguridad y los riesgos se transforman en oportunidades.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/Imagenes/Prueba 3.jpg" class="img-fluid rounded mx-auto d-block" style="max-width: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Third slide label</h2>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>

    <!-- Seccion Quienes Somos -->
    <section class="nosotros my-5">
        <h2 class="text-center my-5">¿Quiénes Somos?</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        INGENIERÍA Y MINERALES EL PIJAO SAS. Es un emprendimiento que se creó para atender las necesidades de las empresas en los sectores Industriales y Agrícola en temas de Gestión de Activos; adicionalmente tiene un portafolio de productos minerales no metálicos dedicados al sector agroindustrial.
                    </p>
                    <p>
                        El PIJAO acompaña a sus clientes en la Gestión de Activos desde la Evaluación en la adquisición de Maquinaria y Equipos, Diseño de políticas, Capacitación al Personal, planes de producción y Mantenimiento hasta la dada de baja de Activos por renovación.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="assets/Imagenes/Quienes.jpeg" class="img-fluid mx-auto d-block" style="max-height: 300px;" alt="trabajo con maquinaria">
                </div>
            </div>
        </div>
    </section>    

    <div class="separador">
      <hr>
    </div>
    <!-- seccion nuestro productos -->
    <section class="nosotros my-4">
      <h1 class="text-center my-4">Nuestros Productos</h1>
        <div class="container">
            <div class="row gx-3 gy-3">
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Cal R15.jpg" class="card-img-top img-fluid" alt="Supervision de Maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Cal R15</h4>
                            <p class="card-text">Es un producto Caustico No Toxico para el Control Biológico fitosanitario de Plagas como Hormigas, Gusanos, Babosas y Caracoles entre otros, actúa por su alto nivel de oxidación y deshidratación sobre las...</p>
                            <a href="paginas/Productos.html" class="btn  boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Carbonato de calcio.jpg" class="card-img-top img-fluid" alt="Mantenimiento de maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Carbonato de Calcio</h4>
                            <p class="card-text">es un producto usado en la industria de alimentos como complemento importante de Calcio, en la industria química en diversas aplicaciones entre ellas   neturalizador del PH; y en el sector industrial para...</p>
                            <a href="paginas/Maquinaria y equipo.html#MantenimientodeMaquinaria" class="btn  boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Cal Hidratada.jpg" class="card-img-top img-fluid" alt="Mantenimiento de maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Fortycal</h4>
                            <p class="card-text">es una Cal para enmienda agrícola, especialmente elaborada para corregir la acidez del suelo. Mediante una acción rápida mejora el PH del suelo y por lo tanto sus propiedades fisico-químicas.</p>
                            <a href="paginas/Productos.html" class="btn boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separador">
          <hr>
        </div>
    </section> 

    <div class="separador">
      <hr>
    </div>
    <!-- seccion nuestro servicos -->
    <section class="nosotros my-4">
      <h1 class="text-center my-4">Nuestros Servicios</h1>
        <div class="container">
            <div class="row gx-3 gy-3">
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Administracion de maquinaria.jpeg" class="card-img-top img-fluid" alt="Supervision de Maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Diseño de Políticas para la Administración de Maquinaria y Equipo</h4>
                            <p class="card-text">Implica la creación de directrices y procedimientos estratégicos para supervisar, mantener y optimizar el uso de maquinaria y equipos dentro de una...</p>
                            <a href="paginas/Maquinaria y equipo.html#MaquinariayEquipo" class="btn  boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Mantenimiento de maquinaria.jpeg" class="card-img-top img-fluid" alt="Mantenimiento de maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Diagnóstico y Planes de Mejora en el Mantenimiento de Maquinaria</h4>
                            <p class="card-text">Implican una evaluación exhaustiva de los procesos de mantenimiento existentes en una organización para identificar áreas de mejora y diseñar estrategias para optimizar...</p>
                            <a href="paginas/Maquinaria y equipo.html#MantenimientodeMaquinaria" class="btn  boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100">
                        <img src="assets/Imagenes/Evaluacion Financiera.jpg" class="card-img-top img-fluid" alt="Mantenimiento de maquinaria">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">Evaluación Financiera de Proyectos</h4>
                            <p class="card-text">La evaluación financiera de proyectos implica el análisis exhaustivo de aspectos económicos y financieros para determinar la viabilidad y rentabilidad de una iniciativa o proyecto específico....</p>
                            <a href="paginas/Proyectos.html#GestióndeRiesgosenProyectos" class="btn boton-ver-mas btn-primary mt-auto mx-auto">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separador">
          <hr>
        </div>
    </section> 
    <div class="separador my-3">
      <hr>
    </div>
    
    <!-- Pie de Pagina  -->
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
   <div class="separador">
    <hr>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>