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

 $precioFlete= $_GET['precio'];





?>




<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estiloPago.css">

   

   

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estiloIndex.css">

   

 

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />




    <title>Formulario de Método de Pago</title>




</head>




<body>





    <br><br>

   

  <body>

   




    <div class="container">




        <div class="card-container">




            <div class="front">

                <div class="image">

                    <img src="https://purepng.com/public/uploads/large/google-stadia-logo-3cx.png" class="bank-logo" alt="">

                    <img src="https://logodownload.org/wp-content/uploads/2014/07/mastercard-logo-2.png" alt="">

                </div>

                <div class="card-number-box">################</div>

                <div class="flexbox">

                    <div class="box">

                        <span>Titular</span>

                        <div class="card-holder-name">Nombre</div>

                    </div>

                    <div class="box">

                        <span>fecha</span>

                        <div class="expiration">

                            <span class="exp-month">Mes</span>

                            <span class="exp-year">Año</span>

                        </div>

                    </div>

                </div>

            </div>




            <div class="back">

                <div class="stripe"></div>

                <div class="box">

                    <span>cvv</span>

                    <div class="cvv-box"></div>

                    <img src="https://logodownload.org/wp-content/uploads/2014/07/mastercard-logo-2.png" alt="">

                </div>

            </div>




        </div>




        <form id="formulario"  method="POST" action="">

        <div class="inputBox">

        <span>Monto a pagar</span>

        <input disabled id="monto" name="monto" value="<?php echo $precioFlete ?>" maxlength="16" class="card-number-input" >

    </div>

        <div class="inputBox">

        <span>Numero de tarjeta</span>

        <input id="numero" name="numero" type="text" maxlength="16" class="card-number-input">

        <div id="numeroError" class="error-message"></div>

    </div>

    <div class="inputBox">

        <span>Titular de la tarjeta</span>

        <input id="nombre" name="nombre" type="text" maxlength="50" class="card-holder-input">

        <div id="nombreError" class="error-message"></div>

    </div>




    <br>

            <div class="flexbox">

                <div class="inputBox">

                    <span>Mes de expiracion</span>

                    <select  id="mes" name="mes" class="month-input">

                    <option value="month" selected disabled>Mes</option>

                    <option value="01">01</option>

                    <option value="02">02</option>

                    <option value="03">03</option>

                    <option value="04">04</option>

                    <option value="05">05</option>

                    <option value="06">06</option>

                    <option value="07">07</option>

                    <option value="08">08</option>

                    <option value="09">09</option>

                    <option value="10">10</option>

                    <option value="11">11</option>

                    <option value="12">12</option>

                </select>

                </div>

                <div class="inputBox">

                    <span>Año de expiracion</span>

                    <select  id="anio" name="anio" class="year-input">

                    <option value="year" selected disabled>Año</option>

                    <option value="2023">2023</option>

                    <option value="2024">2024</option>

                    <option value="2025">2025</option>

                    <option value="2026">2026</option>

               

                </select>

                </div>

                <div class="inputBox">

        <span>cvv</span>

        <input id="cvv" name="cvv" type="text" maxlength="4" class="cvv-input">

        <div id="cvvError" class="error-message"></div>

    </div>

   

            </div>





            <input type="hidden" name="id_usuario" id="id_usuario">

            <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>">

            <input type="hidden" name="operacion" id="operacion" value="Pagar">        

            <input type="submit"  name="action" id="action" value="Pagar" class="submit-btn" >

        </form>




    </div>

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

                var numero = $("#numero").val();

                var nombre = $("#nombre").val();

                var mes = $("#mes").val();

                var anio = $("#anio").val();

                var cvv = $("#cvv").val();

                var userId = $("#userId").val();

             




                if(numero != '' && nombre != ''){

                    $.ajax({

                        url: "vista/recursos/pago_php/crear_pago.php",

                        method: "POST",

                        data: new FormData(this),

                        contentType: false,

                        processData: false,

                        success: function(data)

                        {

                            alert(data);

                            $('#formulario')[0].reset();

                            window.location.href="index.php?pagina=vistaFecha";

                        }

                    });

                }else{

                    alert("Algunos campos son obligatorios");

                }

            });

         });






</script>




<script src="vista/recursos/js/validacionPago.js"></script>

</body>





</html>