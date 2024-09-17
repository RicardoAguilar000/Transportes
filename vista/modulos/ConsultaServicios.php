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
    <title>Consulta Servicios</title>
</head>
<ul class="breadcrumb">
    <li><a href="index.php?pagina=inicio">Inicio</a></li>
    <li><a href="index.php?pagina=ConsultaServicios">Consulta Cotizaciones</a></li>
</ul>
<body>
    <header>
        <?php 
    include "cabezeraAdmin.php";  
    ?>
    </header>
    <!--<div class="titulo">
        <span>
            <h1>TABLA DE SERVICIOS</h1>
        </span>
    </div>-->
    <div class="titulo">
        <span>
            <h1>CONSULTAR COTIZACIONES</h1>
        </span>
    </div>
    <br>
    <div class="container fondo">
        <div class="table-responsive">
            <table id="datos_cotizaciones" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>id_usuario</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Valor $</th>
                        <th>Prioridad</th>
                        <th>Piezas</th>
                        <th>Distancia</th>
                        <th>Peso</th>
                        <th>Largo</th>
                        <th>Ancho</th>
                        <th>Alto</th>
                        <th>Empaque</th>
                        <th>Precio del Flete</th>
                        <th>Ver Factura</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                        <th>Responder cotización</th>
                    </tr>
                </thead>
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
                        <div class="modal-body" id="formPrecio">
                            <label for="precioFlete">Ingrese el precio del flete</label>
                            <input type="text" name="precioFlete" id="precioFlete" class="form-control">
                            <br>
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
    

    <div class="d-flex">
        <div class="p-2 w-100"></div>
        <div class="p-2 flex-shrink-1">
            <img src="<?php echo $ruta."/" ?>img/chatbot.png" class="hamburguer">
        </div>
    </div>

    <?php 
    include "footer.php"; 
    ?>


    <style>
          
    .formulario__input-error {
    color: red;
    font-size: 16px;
    margin-top: 5px;
    }
    </style>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">
         $(document).ready(function(){


            /*$("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $(".modal-title").text("Crear Usuario");
                $("#action").val("Crear"); 
                $("#operacion").val("Crear"); 
                $("#imagen_subida").html(""); 
            });*/

            //CONSULTA REGISTROS DE COTIZACIONES 

            var dataTable = $('#datos_cotizaciones').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url: "vista/recursos/cotizacion_php/obtener_registros_cot.php",
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
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligatorios");
                }
            });
            //FIN CODIGO INSERCCION

         //RESPONDER COTIZACION
         $(document).on('click', '.responder', function(){	
                event.preventDefault();
                var precioFlete = $("#precioFlete").val();	
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
                            $('#prioridad').val(data.prioridad);
                            $('#piezas').val(data.piezas);
                            $('#distancia').val(data.distancia);
                            $('#formEdit').hide();
                            $('#formPrecio').show();
                            $('#precioFlete').val(data.precioFlete);
                            $('.modal-title').text("Responder Cotizacion");
                            $('#id_usuario').val(id_usuario);
                            $('#action').val("Responder");
                            $('#operacion').val("Responder");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        }
                    })
	        });
            //FIN RESPONDER COTIZACION

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
                        $('#prioridad').val(data.prioridad);
                        $('#piezas').val(data.piezas);
                        $('#distancia').val(data.distancia);
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

            //FUNCION BORRAR
            $(document).on('click', '.borrar', function(){
                var id_usuario = $(this).attr("id");
                if(confirm("¿Esta seguro de eliminar la cotizacion?"))
                {
                    $.ajax({
                        url:"vista/recursos/cotizacion_php/borrarCot.php",
                        method:"POST",
                        data:{id_usuario:id_usuario},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });
         });
    </script>


<script src="vista/recursos/js/validarCotizaciones.js"></script>
</body>
</html>