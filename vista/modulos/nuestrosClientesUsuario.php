<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conoce a nuestros clientes</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosClientes.css">
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/redesSociales.css">
    <link rel="stylesheet" href="vista/modulos/contacto/contacto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <ul class="breadcrumb2">
        <li><a href="index.php?pagina=vistaUsuario">Inicio</a></li>
        <li><a href="index.php?pagina=nuestrosClientesUsuario">Conoce a nuestros clientes</a></li>
    </ul>
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
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=serviciosUsuario">Servicios</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=conductores">Conductores</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=vistaCotizacionesUsuario">Cotizaciones</a>
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
    <div class="contenedor_social">
        <div class="redes_sociales">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=100093149917487&is_tour_dismissed=true" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://instagram.com/transportaoficial?igshid=MzRlODBiNWFlZA==" class="instagram"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/TRANSPORTA_OF" class="twitter"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="slider-area">
        <h2>Nuestros Clientes</h2>
        <h4>Ser recomendados por un cliente es nuestro mayor orgullo</h4>
        <p>Nuestros clientes son el foco central de nuestro trabajo. Con nuestro esfuerzo permanente conseguimos una relación solida y eficiente. Todos nuestros clientes, independientemente de su tamaño, son únicos e importantes.</p>
        <p>Ser recomendados por un cliente es nuestro mayor orgullo. De esta forma, intentamos cada día satisfacer y cumplir con los objetivos. Así, estarán encantados de informar respecto de cuánto valoran nuestro trabajo.</p>
        
        <div class="wrapper">
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoAgrizar.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoDonZabor.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoPromexsel.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoSoles.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoWalmart.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoSams.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoAgros.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoFresh.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoHuerta.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-slider" src="<?php echo $ruta."/" ?>img/logoFrivasa.png" alt="">
            </div>
        </div>
    </div>



    <div class="contact_form">

        <div class="formulario">      
          <h1>¡CONTACTANOS!</h1>
            <h2>Escribe un menssaje y en breve los pondremos en contacto contigo</h2>
        
        
              <form action="" method="post">       
        
                    <p>
                      <label for="nombre" class="colocar_nombre">Nombre
                      
                      </label>
                        <input type="text" name="nombre" id="nombre" required="obligatorio" placeholder="Escribe tu nombre">
                    </p>
                  
                    <p>
                      <label for="email" class="colocar_email">Email
                
                      </label>
                        <input type="email" name="correo" id="correo" required="obligatorio" placeholder="Escribe tu Email">
                    </p>
                
                    <p>
                      <label for="telefone" class="colocar_telefono">Teléfono
                      </label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Escribe tu teléfono">
                    </p>    
                  
                    <p>
                      <label for="mensaje" class="colocar_mensaje">Mensaje</label>                     
                    <textarea name="mensaje" class="texto_mensaje" id="mensaje" required="obligatorio" placeholder="Deja aquí tu comentario..."></textarea> 
                    </p>                    
                  
                    <button type="submit" name="enviar_formulario" id="enviar"><p>Enviar</p></button>
              
                    <?php
                     include('vista/modulos/contacto/contactar.php');
                    ?>
                </form>
        </div>  
        </div>
        


    <!--FOOTER-->
    <?php 
        include "footer.php"; 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>