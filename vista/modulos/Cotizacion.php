<?php 

session_start();

include 'vista/modulos/usuarios_php/conexion_bd.php';

$user = $_SESSION['usuario'];

$sql = "SELECT idUsuario, nombre FROM usuarios WHERE correo = '".$user."'";
$resultado = $conexion->query($sql);

while($data  = $resultado->fetch_assoc()){
  $nombre = $data['nombre'];  
  $userId = $data['idUsuario'];  
}

  /*if(!isset($_SESSION['usuario'])){
    echo '
      <script> 
        alert("Debes iniciar sesión");
        window.location = "login_registro_paciente.php";
      </script>    
    ';
    //header("location: login_registro_paciente.php");
    session_destroy();
    die();
  }*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosCoti.css">
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estiloIndex.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="vista/recursos/css/validarCotizacion.css"></script>


</head>
<ul class="breadcrumb ">
    <li><a href="index.php?pagina=vistaUsuario">Inicio</a></li>
    <li><a href="index.php?pagina=Cotizacion">Cotizador</a></li>
  </ul>
<body>
  
            <div class="contenedor_social">
                <div class="redes_sociales">
                    <ul>
                        <li><a href="https://www.facebook.com/profile.php?id=100093149917487&is_tour_dismissed=true" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://instagram.com/transportaoficial?igshid=MzRlODBiNWFlZA==" class="instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/TRANSPORTA_OF" class="twitter"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
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
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=serviciosUsuario">Servicios</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=conductores">Conductores</a>
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
                <img class="icon" src="<?php echo $ruta."/" ?>img/buscar.png">
                </div>
                </form>
                </div>
            </div>
            </div>

        </nav>
        </header>
    <form class="formulario" enctype="multipart/form-data" method="POST" id="formulario"> 
        <h2 class="titulo_formulario">Cotizador</h2>
        
        <div class="contenedor_principal">
            <div class="form_grupo">
                <input type="text" id="origen" name="origen" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Direccion de origen</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <input type="text" id="destino" name="destino" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Direccion de Destino</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <input maxlength="8" type="text" id="valor" name="valor" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Valor Declarado (MXM)</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <select name="prioridad" id="prioridad" class="form_input">
                    <option disabled selected value>Elija una opción</option>
                    <option value="Urgente">Urgente</option>
                    <option value="No urgente">No urgente</option>
                </select>
                <label for="name" class="form_label">Priodidad</label>
                <span class="form_line"></span>
            </div>
            <h3>Mercancia</h3>
           <br>
            <div class="contenedor_producto">
                <div class="form_grupo">
                    <input maxlength="8" type="text" id="piezas" name="piezas" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Piezas</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <input maxlength="8" type="text" id="distancia" name="distancia" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Distancia (Km)</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <img src="<?php echo $ruta."/" ?>img/kilo.webp" alt="" class="pixel">
                    <input maxlength="8" type="text" id="peso" name="peso" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Peso (kg)</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <img src="<?php echo $ruta."/" ?>img/largo.webp" alt="" class="pixel">
                    <input maxlength="3" type="text" id="largo" name="largo" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Largo (cm)</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <img src="<?php echo $ruta."/" ?>img/ancho.webp" alt="" class="pixel">
                    <input maxlength="3" type="text" id="ancho" name="ancho" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Ancho (cm)</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <img src="<?php echo $ruta."/" ?>img/alto.webp" alt="" class="pixel">
                    <input maxlength="3" type="text" id="alto" name="alto" class="form_input" placeholder=" ">
                    <label for="name" class="form_label">Alto (cm)</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_grupo">
                    <select name="empaque" id="empaque" class="form_input">
                        <option disabled selected value>Elija una opción</option>
                        <option value="barril">Barril</option>
                        <option value="bolsas">Bolsas</option>
                        <option value="bultos">Bultos</option>
                        <option value="cajaCarton">Caja de cartón</option>
                        <option value="cajaChica">Caja chica</option>
                        <option value="cajaDoble">Caja doble</option>
                    </select>
                    <label for="name" class="form_label">Empaque</label>
                    <span class="form_line"></span>
                </div>
            </div>
            <input type="hidden" name="id_usuario" id="id_usuario">
            <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>">
            <input type="hidden" name="operacion" id="operacion" value="Cotizar">   
            <div class="mb-3">
            <br>
            <label for="file" class="form-label">Cargar Factura</label>
            <input type="file" id="file" name="file" class="form_control">
            </div>        
            <input type="submit" name="action" id="action" class="form_submit" value="Cotizar">
        </div>

      

    </form>


  <style>
   
   .pixel{
        width: 30%;
       
        margin-bottom: 50px;
    }

    
    .formulario__input-error {
    color: red;
    font-size: 13px;
    margin-top: 5px;
  
  }

  </style>

    <?php 
    include "footer.php"; 

    
    ?>
    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
         $(document).ready(function(){

            //Aqui codigo de insercion

            
            $(document).on('submit', '#formulario', function(event){
                event.preventDefault();
                var origen = $("#origen").val();
                var destino = $("#destino").val();
                var valor = $("#valor").val();
                var prioridad = $("#prioridad").val();
                var piezas = $("#piezas").val();
                var distancia = $("#distancia").val();
                var peso = $("#peso").val();
                var largo = $("#largo").val();
                var ancho = $("#ancho").val();
                var alto = $("#alto").val();
                var empaque = $("#empaque").val();
                var userId = $("#userId").val();

                if(origen != '' && destino != '' && valor != ''){
                    $.ajax({
                        url: "vista/recursos/cotizacion_php/crear_cot.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data)
                        {
                            alert(data);
                            $('#formulario')[0].reset();
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligatorios");
                }
            });
         });
    </script>

      <script src="vista/recursos/js/validarCotizaciones.js"></script>
</body>
</html>