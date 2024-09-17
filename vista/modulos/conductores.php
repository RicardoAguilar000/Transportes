<?php 
 require('modelo/conexio.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estiloIndex.css" />
  <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/conductores.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" />


  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" type="image/x-icon">


  <title>Conductores</title>
</head>
<ul class="breadcrumb ">

  <li><a href="index.php?pagina=inicio">Inicio</a></li>


  <li><a href="index.php?pagina=conductores">Conductores</a></li>

</ul>

<body>
    <header>
        <nav class="navbar navbar-expand-lg barra mes">

        <div class="container-fluid ">
            <img class="logo ms-5" src="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end navbar-dark bg-dark " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  ">

                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=vistaUsuario">Inicio</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=Cotizacion">Cotizacion</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=serviciosUsuario">Servicios</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=vistaCotizacionesUsuario">Cotizaciones</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=nuestrosClientesUsuario">Clientes</a>
                    </li>

                </ul>

                <form class="d-flex  p-2" role="search">
                <input id="buscador" class="form-control me-2 p-2" type="text" placeholder="Buscar texto" aria-label="Search">
                    <div class="mar">
                <img class="icon" src="<?php echo $ruta."/" ?>img/buscar.png"  >
                </div>
                </form>
                </div>
            </div>
            </div>

        </nav>
    </header>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo $ruta."/" ?>img/imagen1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $ruta."/" ?>img/imagen2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $ruta."/" ?>img/imagen3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo $ruta."/" ?>img/imagen4.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next barra" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- fin del carrusel-->
  <h2 class="linea">&nbsp;</h2>


  <section class="conductores container">
    <div class="tipo_viaje_content">
      <div class="informacion">
        <div class="informacion2">
          <h2>Nuestros Conductores</h2>
          <p>
            Nuestros conductores están altamente capacitados, lo cual nos permite garantizar el éxito total de nuestras
            entregas. Cada uno de nuestros operadores tienen el compromiso de cumplir con tiempo y forma en cada una de
            sus entregas, lo que garantiza una excelente seguridad. Gracias al excelente ambiente de trabajo que tiene
            TransPorta hemos logrado estar unidos como una familia, lo cual nos fortalece como empresa ya que así
            podemos trabajar en equipo obteniendo mejores resultados.
          </p>
        </div>
      </div>
    </div>
    <div class="img-car">
      <img src="<?php echo $ruta."/" ?>img/operador.jpg" alt="">
    </div>
  </section>

  <h2 class="linea">&nbsp;</h2>
  <main>




    <!-- Carrusel de conductores-->
    <div class="container-fluid my-5">
      <h1 class="text-center fw-bold display-1 mb-5">Listado <span class="text-danger">de Conductores:</span></h1>
      <div class="row carru">
        <div class="col-9 m-auto">
          <div class="owl-carousel owl-theme">
          <?php
                        $sql = "SELECT nombre, foto, numeroLicencia FROM conductores";
                        $resultadoU = mysqli_query($conexion, $sql);


                        while ($row = mysqli_fetch_assoc($resultadoU)) {
                            $nombre = $row['nombre'];
                            $numeroLicencia = $row['numeroLicencia'];
                            $foto = $row['foto'];
                                            ?>
            <div class="item">
              <div class="card border-0 ">
                <div class="card-body">
                  <img src="./modelo/img/<?php echo $foto; ?>" alt="" class="card-img">
                  <h3 class="n-expert"><?php echo $nombre; ?></h3>
                  <h5 class="n-expert">Conductor : <?php echo $numeroLicencia; ?></h5>
                  <!--<button type="button" class="boton-hover" data-bs-toggle="modal" data-bs-target="#myModal">Mas
                    Información</button>-->
                </div>
              </div>
            </div>
            <?php
              }
              mysqli_free_result($resultadoU);
            ?>

           
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Información de la persona</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="<?php echo $ruta."/" ?>img/conductor1.jpg" alt="" class=" img-modal">
            <p>
            <h3>Nombre:</h3>Pablo Fernando Ibarra Ponce</p>
            <p>
            <h3>Edad:</h3> 30 años</p>
            <p>
            <h3>Años de experiencia:</h3> 2 años</p>
            <p>
            <h3>Numero de licencia:</h3>672572567641</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>




  </main>


  <?php 
    include "footer.php"; 

    
    ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>

  <script src="<?php echo $ruta."/" ?>js/nosotros.js"></script>

</body>

</html>