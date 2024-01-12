<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilosProducto.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>prueb</title>
</head>
<body>
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
                        <a class="nav-link" href="productos.php">Productos</a>
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

    <section class="tituloP">
      <h1 >PRODUCTOS</h1>
    </section>

    <div class="separador">
    <hr>
  </div>

    <div class="container">
	  	<?php 
		    include("conexion.php");
			  $query = "SELECT * FROM productos";
			  $resultado = $conexion->query($query);
			    while($row = $resultado->fetch_assoc()){
				  ?> 
         <div class=col-md-4>
				  <div class="card">
					  <img src="data:image/jpg;base64, <?php echo base64_encode($row ['imagen']); ?>">
					  <h4><?php echo $row ['nombre']; ?> </h4>
					  <p> <?php echo $row ['descripcion'];?> </p>
					  <a href="#">comprar</a>
				  </div>
        </div> 
				<?php 
			}
			?> 
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

</body>
</html>