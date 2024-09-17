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
        <h1 class="text-center">Confirmar fecha de viaje</h1>
      
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
                        <th>Piezas</th>
                        <th>Peso</th>
                        <th>Largo</th>
                        <th>Ancho</th>
                        <th>Alto</th>
                        <th>Empaque</th>
                        <th>Precio del Flete</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                        <th>Confirmar fecha de embarque</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'vista/modulos/usuarios_php/conexion_bd.php';
                    $consultaU =" SELECT * 
                    FROM `cotizaciones` WHERE `usuario` = '$userId'";
                                $resultadoU = mysqli_query($conexion, $consultaU);
              while($row = mysqli_fetch_assoc($resultadoU)){ 
            ?> <tr> 
                        <td><?php echo $row ['origen'];?></td>
                        <td><?php echo $row ['destino'];?></td>
                        <td><?php echo $row ['valor'];?></td>
                        <td><?php echo $row ['piezas'];?></td>
                        <td><?php echo $row ['peso'];?></td>
                        <td><?php echo $row ['largo'];?></td>
                        <td><?php echo $row ['ancho'];?></td>
                        <td><?php echo $row ['alto'];?></td>
                        <td><?php echo $row ['empaque'];?></td>
                      

                        <td><?php echo $row ['precioFlete'];?></td>



                  
                        <td><button type="button" name="editar" id="<?php echo $row ['id'];?>" class="btn btn-warning
        btn-xs editar">Editar</button></td>


                        <td>
                     <a type="button" name="borrar" onclick="return confirmDelete()"  href="./vista/recursos/cotizacion_php/borrarCot.php?id=<?php echo $row["id"];?>"
                                class="btn btn-danger btn-xs borrar">Eliminar</a>
                        </td>

                        <td><button type="button" name="confirmar" id="<?php echo $row ['id'];?>" class="btn btn-success 
        btn-xs confirmar">Confirmar</button></td>
                    </tr>
                    <?php
      }
      mysqli_free_result($resultadoU);
    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalViaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="modal-body" id="formEdit">
                            <label for="fechaEmbarque">Elija la fecha del embarque</label>
                            <input type="date" name="fechaEmbarque" id="fechaEmbarque" class="form-control">
                            <br>


                            
                        </div>
                       
                        <div class="modal-footer">
                            <input type="hidden" name="id_usuario" id="id_usuario">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>">
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
    </script>




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


        $(document).on('submit', '#formulario', function(event) {
            event.preventDefault();
            var fechaEmbarque = $("#fechaEmbarque").val();
           
            var id_usuario = $(this).attr("id");

            $.ajax({
                url: "vista/recursos/cotizacion_php/crear_cot.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data);
                    $('#formulario')[0].reset();
                    $('#modalViaje').modal('hide');
                
                }
            });
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
                        $('#valor').val(data.valor);
                        $('#piezas').val(data.piezas);
                        $('#peso').val(data.peso);
                        $('#largo').val(data.largo);
                        $('#ancho').val(data.ancho);
                        $('#alto').val(data.alto);
                        $('#empaque').val(data.empaque);
                        $('#formEdit').show();
                        $('#formPrecio').hide();
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