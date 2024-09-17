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

    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estilosCrud.css" />

    <link rel="shortcut icon" href="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" type="image/x-icon">


    <title>Consulta Unidad</title>
</head>
<ul class="breadcrumb ">
    <li><a href="index.php?pagina=inicio">Inicio</a></li>
    <li><a href="index.php?pagina=ConsultaUnidad">Consulta Unidad</a></li>

</ul>

<body>

    <header>

        <?php 
    include "cabezeraAdmin.php"; 

    
    ?>


    </header>

    <div class="titulo">
        <span>
            <h1>TABLA DE UNIDADES</h1>
        </span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center crear">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuario"
                        id="botonCrear">
                        <i class="bi bi-plus-circle-fill">Crear</i>
                    </button>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="table-responsive">
            <table class="tabla table  table-bordered bdr" id="datos_usuario" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">marca</th>
                        <th scope="col">modelo</th>
                        <th scope="col">color</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>


                </thead>
            </table>
        </div>
    </div>

    <!-- modal agregar-->

    <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalAgregar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalAgregar">Crear Unidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">

                        <span class="d-flex align-items-center justify-content-center" id="imagen_subida"></span>


                        <div class="modal-body">

                           <label for="id_remolque">Ingrese  Remolque</label>
                            <select name="id_remolque" id="id_remolque" class="form-control">
                            <option value="">Seleciona una opción</option>


                            <?php
                        $sql = "SELECT idRemolque, marca FROM remolque";
                        $resultado = mysqli_query($conexion, $sql);


                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idRemolque = $row['idRemolque'];
                            $marca = $row['marca'];
                                            ?>
                            <option value="<?php echo $idRemolque; ?>"><?php echo $marca; ?></option>
                            <?php
              }
              mysqli_free_result($resultado);
            ?>

                            </select>
                            <span class="error-message" id="id_remolque_error" style="color:red"></span>

                            <br>

                            <label for="marca">Ingrese la marca</label>
                            <input type="text" name="marca" id="marca" class="form-control">
                            <span class="error-message" id="marca_error" style="color:red"></span>


                            <br>
                            <label for="modelo">Ingrese el modelo</label>
                            <input type="text" name="modelo" id="modelo" class="form-control">
                            <span class="error-message" id="modelo_error" style="color:red"></span>
                            <br>


                            <label for="color">Ingrese el color</label>
                            <input type="text" name="color" id="color" class="form-control">
                            <span class="error-message" id="color_error" style="color:red"></span>

                            <br>

                            <label for="descripcion">Ingrese su descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                            <span class="error-message" id="descripcion_error" style="color:red"></span>
                            <br>

                            <br>
                            <label for="imagen">Selecciona una imagen</label>
                            <input type="file" name="imagen_unidad" id="imagen_unidad" class="form-control">
                            <span class="error-message" id="imagen_unidad_error" style="color:red"></span>
                        </div>

                        <div class="modal-footer boton-modal">
                            <input type="hidden" name="id_unidad" id="id_unidad">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn-success" values="Crear">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- fin modal agregar-->




    <?php 
    include "footer.php"; 
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>

<script src="./vista/recursos/js/datatablesU.js"></script>







</body>



</html>