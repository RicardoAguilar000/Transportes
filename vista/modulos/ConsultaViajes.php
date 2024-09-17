<?php

 require('modelo/conexio.php');




 

?>

<!DOCTYPE html>

<html lang="es">




<head>

    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosCrud.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Consulta Viajes</title>

</head>

<ul class="breadcrumb ">




    <li><a href="index.php?pagina=inicio">Inicio</a></li>

    <li><a href="index.php?pagina=ConsultaViajes">Consulta Viajes</a></li>





</ul>




<body>




    <header>





        <?php

    include "cabezeraAdmin.php";

    ?>

    </header>




    <div class="titulo">

        <span>

            <h1>CONSULTAR VIAJES</h1>

        </span>

    </div>

    <br>

    <div class="container fondo">

        <div class="table-responsive">

            <table id="datos_cotizaciones" class="table table-bordered table-striped">

                <thead>

                    <tr>

                   

                        <th>id_viaje</th>
                        
                        <th>Conductor</th>

                        <th>Fecha de embarque</th>

                        <th>Fecha de desembarque</th>

                        <th>Status</th>

                        <th>Confirmar fechas</th>

                        

                    </tr>

                </thead>

            </table>

        </div>

    </div>




    <div class="modal fade" id="modalViaje" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

           

                <form method="POST" id="formulario" enctype="multipart/form-data">

                    <div class="modal-content">

                        <div class="modal-body">

                            <label for="fechaEmbarque">Eliga la fecha del embarque</label>

                            <input type="date" name="fechaEmbarque" id="fechaEmbarque" class="form-control">

                            <br>




                            <label for="fechaDesembarque">Eliga la fecha del desembarque</label>

                            <input type="date" name="fechaDesembarque" id="fechaDesembarque" class="form-control">

                            <br>

                        </div>

                        <div class="modal-body">

                            <label for="conductor">Conductor</label>

                            <br>

                            <br>

                            <select name="conductor" id="conductor" class="form_input">

                            <option disabled selected value>Elija un conductor</option>





                            <?php





$sql = "SELECT nombre FROM conductores";




$resultadoU = mysqli_query($conexion, $sql);





while ($row = mysqli_fetch_assoc($resultadoU)) {

    $nombre = $row['nombre'];

                    ?>

    <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>

    <?php

}

mysqli_free_result($resultadoU);

?>

                            </select>

                        </div>

                        <div class="modal-body">

                            <label for="status">Estado del viaje</label>

                            <br>

                            <br>

                            <select name="status" id="status" class="form_input">

                                <option disabled selected value>Elija una opción</option>

                                <option value="De camino al embarque">De camino al embarque</option>

                                <option value="En trayecto">En trayecto</option>

                                <option value="Realizando desembarque">Realizando desembarque</option>

                                <option value="Finalizado">Finalizado</option>

                            </select>

                        </div>

                     

                       

                        <div class="modal-footer">

                            <input type="hidden" name="id_viaje" id="id_viaje">

                            <input type="hidden" name="operacion" id="operacion">

                            <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">

                        </div>

                    </div>

                </form>

            </div>

            </div>

        </div>

    </div>


    <script>
       document.addEventListener("DOMContentLoaded", function() {
  var fechaEmbarqueInput = document.getElementById("fechaEmbarque");

  // Obtener fecha actual
  var fechaActual = new Date().toISOString().split("T")[0];
  fechaEmbarqueInput.setAttribute("min", fechaActual);
});

document.addEventListener("DOMContentLoaded", function() {
  var fechaDesembarqueInput = document.getElementById("fechaDesembarque");

  // Obtener fecha actual
  var fechaActual = new Date().toISOString().split("T")[0];
  fechaDesembarqueInput.setAttribute("min", fechaActual);
});

    </script>
   




    <div class="d-flex">

        <div class="p-2 w-100"></div>

        <div class="p-2 flex-shrink-1">

            <img src="<?php echo $ruta."/" ?>img/chatbot.png" class="hamburguer">

        </div>

    </div>




    <?php

    include "footer.php";

    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>




    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

   

    <!-- Optional JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





    <script type="text/javascript">

         $(document).ready(function(){




            //CONSULTA REGISTROS DE COTIZACIONES




            var dataTable = $('#datos_cotizaciones').DataTable({

                "processing":true,

                "serverSide":true,

                "order":[],

                "ajax":{

                    url: "vista/recursos/cotizacion_php/obtener_registros_viajes.php",

                    type: "POST"

                },

                "columnsDefs":[

                    {

                        "targets":[0,3,4],

                        "orderable":false,

                    },

                ],

                "language": {

                "decimal": "",

                "emptyTable": "No hay registros",

                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

                "infoFiltered": "(Filtrado de _MAX_ total entradas)",

                "infoPostFix": "",

                "thousands": ",",

                "lengthMenu": "Mostrar _MENU_ Entradas",

                "loadingRecords": "Cargando...",

                "processing": "Procesando...",

                "search": "Buscar:",

                "zeroRecords": "Sin resultados encontrados",

                "paginate": {

                    "first": "Primero",

                    "last": "Ultimo",

                    "next": "Siguiente",

                    "previous": "Anterior"

                }

            }

            });

            //FIN DE REGISTROS




            //CODIGO DE INSERCION

            $(document).on('submit', '#formulario', function(event){

                event.preventDefault();

                var origen = $("#origen").val();

                var destino = $("#destino").val();

                var valor = $("#valor").val();

                var piezas = $("#piezas").val();

                var peso = $("#peso").val();

                var largo = $("#largo").val();

                var ancho = $("#ancho").val();

                var alto = $("#alto").val();

                var empaque = $("#empaque").val();




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

                            $('#modalViaje').modal('hide');

                           

                        }

                    });

                }else{

                    alert("Algunos campos son obligatorios");

                }

            });

            //FIN CODIGO INSERCCION




            //ACTUALIZAR VIAJE

            $(document).on('click', '.actualizar', function(){  

                event.preventDefault();

                var id_viaje = $(this).attr("id");      

                $.ajax({

                    url:"vista/recursos/cotizacion_php/obtener_registro_viaje.php",

                    method:"POST",

                    data:{id_viaje:id_viaje},

                    dataType:"json",

                    success:function(data)

                        {

                            //console.log(data);                

                            $('#modalViaje').modal('show');

                            $('#fechaEmbarque').val(data.fechaEmbarque);

                            $('#conductor').val(data.conductor);

                            $('#fechaDesembarque').val(data.fechaDesembarque);

                            $('#status').val(data.estado);

                            $('#id_viaje').val(id_viaje);

                            $('.modal-title').text("Actualizar viaje");

                            $('#action').val("Confirmar");

                            $('#operacion').val("Seleccionar");

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                        console.log(textStatus, errorThrown);

                        }

                    })

            });

         });

    </script>
    

</body>

</html>