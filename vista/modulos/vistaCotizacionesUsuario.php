
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

?>




<!DOCTYPE html>

<html lang="en">




<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Conoce a nuestros clientes</title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosClientes.css">

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/redesSociales.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"

        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="

        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

    <!--Links para crud-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">





</head>




<body>

    <ul class="breadcrumb2">

        <li><a href="index.php?pagina=vistaUsuario">Inicio</a></li>

        <li><a href="index.php?pagina=vistaCotizacionesUsuario">Ver cotizaciones</a></li>

    </ul>

    <nav class="navbar navbar-expand-lg barra mes">




        <div class="container-fluid ">

            <img class="logo ms-5" src="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" alt="">

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"

                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="offcanvas offcanvas-end navbar-dark bg-dark " tabindex="-1" id="offcanvasNavbar"

                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header">

                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"

                        aria-label="Close"></button>

                </div>

                <div class="offcanvas-body ">




                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  ">




                        <li class="nav-item nave">

                            <a class="nav-link active text-light fs-3" aria-current="page"

                                href="index.php?pagina=vistaUsuario">Inicio</a>

                        </li>

                        <li class="nav-item nave">

                            <a class="nav-link active text-light fs-3" aria-current="page"

                                href="index.php?pagina=serviciosUsuario">Servicios</a>

                        </li>

                        <li class="nav-item nave">

                            <a class="nav-link active text-light fs-3" aria-current="page"

                                href="index.php?pagina=conductores">Conductores</a>

                        </li>

                        <li class="nav-item nave">

                            <a class="nav-link active text-light fs-3" aria-current="page"

                                href="index.php?pagina=nuestrosClientesUsuario">Clientes</a>

                        </li>




                    </ul>




                    <form class="d-flex  p-2" role="search">

                        <input id="buscador" class="form-control me-2 p-2" type="text" placeholder="Buscar texto"

                            aria-label="Search">

                        <div class="mar">

                            <img class="icon" src="<?php echo $ruta."/" ?>img/buscar.png">

                        </div>

                    </form>

                </div>

            </div>

        </div>




    </nav>

    <div class="container fondo">

        <br>

        <br>

        <h1 class="text-center">C O T I Z A C I O N E S</h1>

     

        <br>

        <br>

        <div class="table-responsive">

            <table id="consulta_cotizaciones" class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <!--<th>N. de cotización</th>-->

                        <th>Origen</th>

                        <th>Destino</th>

                        <th>Valor $</th>
                        <th>Prioridad $</th>

                        <th>Piezas</th>
                        <th>Distancia KM    </th>

                        <th>Peso</th>

                        <th>Largo</th>

                        <th>Ancho</th>

                        <th>Alto</th>

                        <th>Empaque</th>

                        <th>Precio del Flete</th>
                        <th>Ver Factura</th>
                        <th>Editar</th>

                        <th>Borrar</th>

                        <th>Confirmar viaje</th>

                    </tr>

                </thead>




                <tbody>

                    <?php


                    $consultaU =" SELECT *

                    FROM `cotizaciones` WHERE `usuario` = '$userId'";

                                $resultadoU = mysqli_query($conexion, $consultaU);

              while($row = mysqli_fetch_assoc($resultadoU)){

            ?> <tr>

                        <td><?php echo $row ['origen'];?></td>

                        <td><?php echo $row ['destino'];?></td>

                        <td><?php echo $row ['valor'];?></td>
                        <td><?php echo $row ['prioridad'];?></td>

                        <td><?php echo $row ['piezas'];?></td>
                        <td><?php echo $row ['distancia'];?></td>

                        <td><?php echo $row ['peso'];?></td>

                        <td><?php echo $row ['largo'];?></td>

                        <td><?php echo $row ['ancho'];?></td>

                        <td><?php echo $row ['alto'];?></td>

                        <td><?php echo $row ['empaque'];?></td>
                        <td><?php echo $row ['precioFlete'];?></td>
                        <td>
                            <a name="" type="button" href="<?php echo 'vista/recursos/cotizacion_php/' . $row ['ruta']; ?>" target="_blank" class="btn btn-primary btn-xs">Ver factura</a>
                        </td>
                        <td><button type="button" name="editar" id="<?php echo $row ['id'];?>" class="btn btn-warning btn-xs editar">Editar</button></td>





                        <td>

                     <a type="button" name="borrar" onclick="return confirmDelete()"  href="./vista/recursos/cotizacion_php/borrarCot.php?id=<?php echo $row["id"];?>"

                                class="btn btn-danger btn-xs borrar">Eliminar</a>

                        </td>




                        <?php
$precioFlete = $row['precioFlete'];
$url = "index.php?pagina=pago&precio=" . $precioFlete;
?>


<td>
<a type="button" name="confirmar" href="<?php echo $url; ?>" class="btn btn-success btn-xs confirmar">Confirmar</a>
</td>

                    </tr>

                    <?php

      }

      mysqli_free_result($resultadoU);

    ?>

                </tbody>

            </table>

        </div>

    </div>
    <div class="modal fade" id="modalUsuario" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable.modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="POST" id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body" id="formEdit">
                            <label for="origen">Ingrese el origen</label>
                            <input type="text" name="origen" id="origen" class="form-control">
                            <br>
                            <label for="destino">Ingrese el destino</label>
                            <input type="text" name="destino" id="destino" class="form-control">
                            <br>

                            <label for="valor">Ingrese el valor</label>
                            <input type="text" name="valor" id="valor" class="form-control">
                            <br>
                            <label for="prioridad">Prioridad</label>
                            <br>
                            <select name="prioridad" id="prioridad" class="form_input">
                                 <option disabled selected value>Elija una opción</option>
                                 <option value="Urgente">Urgente</option>
                                 <option value="No urgente">No urgente</option>
                            </select>
                            <br>
                            <br>
                            <label for="piezas">Ingrese la cantidad de piezas</label>
                            <input type="text" name="piezas" id="piezas" class="form-control">
                            <br>                           
                            <br>
                            <label for="distancia">Distancia (KM)</label>
                            <input type="text" name="distancia" id="distancia" class="form-control">
                            <br>                           
                            <label for="peso">Peso</label>
                            <input type="text" name="peso" id="peso" class="form-control">
                            <br>
                            <label for="largo">Largo</label>
                            <input type="text" name="largo" id="largo" class="form-control">
                            <br>
                            <label for="ancho">Ancho</label>
                            <input type="text" name="ancho" id="ancho" class="form-control">
                            <br>
                            <label for="alto">Alto</label>
                            <input type="text" name="alto" id="alto" class="form-control">
                            <br>
                            <label for="empaque">Empaque</label>
                            <br>
                            <select name="empaque" id="empaque" class="form_input">
                                <option disabled selected value>Elija una opción</option>
                                <option value="Barril">Barril</option>
                                <option value="Caja de cartón">Caja de cartón</option>
                                <option value="Caja chica">Caja chica</option>
                                <option value="Caja doble">Caja doble</option>
                                <option value="Charola">Charola</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_usuario" id="id_usuario">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!--FOOTER-->

    <?php

    include "footer.php";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>




    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>




    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <!-- Optional JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"

        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">

    </script>

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

    <script type="text/javascript">




function confirmDelete() {

        var respuesta = confirm("¿Estas seguro de que deseas eliminarlo?");

        if (respuesta == true) {

            return true;

        } else {

            return false;

        }

    }


    

    $(document).ready(function() {





        //CONSULTA REGISTROS DE COTIZACIONES

        var dataTable = $('#consulta_cotizaciones').DataTable({




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
        




         //FUNCION BORRAR

        //FIN DE REGISTROS

//CODIGO DE INSERCION
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
                            $('#modalUsuario').modal('hide')
                            //dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligatorios");
                }
            });

          //FUNCION EDITAR

          $(document).on('click', '.editar', function(){		
            var id_usuario = $(this).attr("id");		
            $.ajax({
                url:"vista/recursos/cotizacion_php/obtener_registro_cot.php",
                method:"POST",
                data:{id_usuario:id_usuario},
                dataType:"json",
                success:function(data)
                    {
                        //console.log(data);				
                        $('#modalUsuario').modal('show');
                        $('#origen').val(data.origen);
                        $('#destino').val(data.destino);
                        $('#prioridad').val(data.prioridad);
                        $('#valor').val(data.valor);
                        $('#distancia').val(data.distancia);
                        $('#piezas').val(data.piezas);
                        $('#peso').val(data.peso);
                        $('#largo').val(data.largo);
                        $('#ancho').val(data.ancho);
                        $('#alto').val(data.alto);
                        $('#empaque').val(data.empaque);
                        $('#formEdit').show();
                        $('.modal-title').text("Editar Cotizacion");
                        $('#id_usuario').val(id_usuario);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

        //CONFIRMAR VIAJE

        $(document).on('click', '.confirmar', function() {

            //$("#formulario")[0].reset();

            var fechaEmbarque = $("#fechaEmbarque").val();

         

            var id_usuario = $(this).attr("id");

            $.ajax({

                url: "vista/recursos/cotizacion_php/obtener_registro_cot.php",

                method: "POST",

                data: {

                    id_usuario: id_usuario

                },

                dataType: "json",

                success: function(data) {

                    //console.log(data);

                    $('#modalViaje').modal('show');

                    $(".modal-title").text("Confirmar Viaje");

                    $('#precioFlete').val(data.precioFlete).prop('disabled', true);

                    $('#id_usuario').val(id_usuario);

                    $('#action').val("Confirmar viaje");




                    $('#operacion').val("Confirmar");

                    window.location.href="index.php?pagina=pago";





                },

                error: function(jqXHR, textStatus, errorThrown) {

                    console.log(textStatus, errorThrown);

                }




            })

        });







       










    });

    </script>


<script src="vista/recursos/js/validarCotizaciones.js"></script>

</body>






</html>