<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosServicioss.css">
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/redesSociales.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<ul class="breadcrumb2 ">
  
    <li><a href="index.php?pagina=inicio">Inicio</a></li>
    
    <li><a href="index.php?pagina=servicios">Servicios</a></li>
  </ul>
  <?php 
    include "cabezera.php"; 
    ?>
<body>
    <header class="header">
        <img src="<?php echo $ruta."/" ?>img/bg.png" class="bg" alt="">
        <div class="header-content container_servicios">
            <div class="header-txt header-card-txt">
                <h1><span>Transportando</span> a todo México</h1>
                <p class="palabras">Tenemos el firme propósito de lograr la satisfacción de nuestros clientes, 
                    proporcionándoles servicios especializados de transporte terrestre</p>
            </div>
        </div>
    </header>

    <div class="contenedor_social">
        <div class="redes_sociales">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=100093149917487&is_tour_dismissed=true" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://instagram.com/transportaoficial?igshid=MzRlODBiNWFlZA==" class="instagram"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/TRANSPORTA_OF" class="twitter"><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>

    <main class="services container">
        <p class="info">Tipos de carga</p>
        <h2>Nuestros servicios</h2>
        <div class="services-content">
            <div class="services-txt"> 
                <div class="services-card">
                    <img src="<?php echo $ruta."/" ?>img/1.svg" alt="">
                    <div class="card-txt">
                        <h3>Trailer Completo</h3>
                        <p class="palabras">El servicio de carga completa FTL (Full Truck Load) nos permite transportar camiones completos a las principales ciudades de la república mexicana con tiempos de entrega definidos.
                            Obteniendo un servicio de calidad y tiempo en cada una de nuestras entregas.</p>
                       
                    </div>
                </div>
                <div class="services-card">
                    <img src="<?php echo $ruta."/" ?>img/2.svg" alt="">
                    <div class="card-txt">
                        <h3>Consolidado</h3>
                        <p class="palabras">El servicio de carga consolidada LTL (Less than Truckload) nos permite transportar mercancías 
                            de diferentes clientes en un viaje, que va al mismo destino. Por lo cual las cargas consolidadas son llevadas hasta almacenes donde son agrupadas con otras cargas, 
                            para que puedan ser transportadas a su destino final en tiempo y forma.</p>
                       
                    </div>
                </div>
                <div class="services-card">
                    <img src="<?php echo $ruta."/" ?>img/3.svg" alt="">
                    <div class="card-txt">
                        <h3>Temperatura</h3>
                        <p class="palabras">En Transporta nos comprometemos a ofrecer soluciones estratégicas, diseñadas especialmente para 
                            cada una de las necesidades de nuestros clientes, conservando siempre la temperatura.</p>
                       
                    </div>
                </div>
            </div>
            <div class="services-img">
                <img src="<?php echo $ruta."/" ?>img/peterbilt_noche.jpeg" alt="">
            </div>
        </div>     
    </main>
    <section class="usuarios">
        <!--<img class="wave-1" src="img/wave1.svg" alt="">
        <img class="wave-2" src="img/wave2.svg" alt="">-->
        <div class="usuario-txt container">
            <a href="#" class="info"></a>
            <h2>En transporta contamos con una cobertura de </h2>
            <h3>+ 1,100 destinos</h3>
        </div>
    </section>
    <section class="app container">
        <div class="app-1">
            <img src="<?php echo $ruta."/" ?>img/cuatro.jpg" alt="">
        </div>
        <div class="tipo_viaje_content">
            <div class="app-2">
                <p class="info">Tipos de viaje</p>
                <h2>Viaje redondo</h2>
                <p class="palabras">
                    El servicio de viaje redondo cubre la trayectoria total del recorrido.
                </p>
                <a href="#" class="btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">información</a>   
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Viaje redondo:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body palabras">
                            En este servicio nos encargamos de realizar el viaje con tu primer destino de entrega, 
                            posteriormente se realiza un segundo embarque de regreso al punto de origen.
                            <br>
                            <img class="img-modal" src="<?php echo $ruta."/" ?>img/viajeReondo.jpg" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-2">              
                <h2>Viaje sencillo</h2>
                <p class="palabras">
                    El servicio de viaje sencillo, cubre el viaje desde la ciudad de origen hasta su destino final
                </p>
                <a href="#" class="btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">información</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Viaje sencillo:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            El este servicio nos encargamos de realizar el embarque en el punto de origen asignado 
                            y se da por finalizado hasta que se desembarque en el destino final.
                            <br>
                            <img class="img-modal" src="<?php echo $ruta."/" ?>img/viajeIda.jpg" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
        include "footer.php"; 
    ?>

<style>
        .filtro{
 display: none;
 
 
  
}
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>