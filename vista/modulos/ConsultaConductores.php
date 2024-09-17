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


    <title>Consulta Conductores</title>
</head>
<ul class="breadcrumb ">
    <li><a href="index.php?pagina=inicio">Inicio</a></li>
    <li><a href="index.php?pagina=ConsultaConductores">Consulta Conductores</a></li>

</ul>

<body>

    <header>

        <?php 
    include "cabezeraAdmin.php"; 

    
    ?>


    </header>

    <div class="titulo">
        <span>
            <h1>TABLA DE CONDUCTORES</h1>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Experiencia</th>
                        <th scope="col">Licencia</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Estatus</th>
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
                    <h5 class="modal-title fs-5" id="modalAgregar">Crear Conductor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">

                        <span class="d-flex align-items-center justify-content-center" id="imagen_subida"></span>


                        <div class="modal-body">

 

                            <label for="id_Unidad">Unidad asignada:</label>
                            <select name="id_Unidad" id="id_Unidad" class="form-control">
                            <option value="">Seleciona una opción</option>

                            <?php


                        $sql = "SELECT idUnidad, marca FROM unidades";
                        
                        $resultadoU = mysqli_query($conexion, $sql);


                        while ($row = mysqli_fetch_assoc($resultadoU)) {
                            $idUnidad = $row['idUnidad'];
                            $marca = $row['marca'];
                                            ?>
                            <option value="<?php echo $idUnidad; ?>"><?php echo $marca; ?></option>
                            <?php
              }
              mysqli_free_result($resultadoU);
            ?>
                            </select>
                            <span class="error-message" id="id_Unidad_error" style="color:red"></span>
                           
                            <br>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                            <span class="error-message" id="nombre_error" style="color:red"></span>
                            <br>


                            <label for="edad">Edad:</label>
                            <input type="text" name="edad" id="edad" class="form-control">
                            <span class="error-message" id="edad_error" style="color:red"></span>

                            <br>

                            <label for="experiencia">Experiencia:</label>
                            <input type="text" name="experiencia" id="experiencia" class="form-control">
                            <span class="error-message" id="experiencia_error" style="color:red"></span>
                            <br>

                            <label for="numeroLicencia">Numero de licencia:</label>
                            <input type="text" name="numeroLicencia" id="numeroLicencia" class="form-control" maxlength="9">
                            <span class="error-message" id="numeroLicencia_error" style="color:red"></span>
                            <br>

                            <label for="estatus">Estatus:</label>
                            <!-- <input type="number" name="estatus" id="estatus" class="form-control">-->
                            <select name="estatus" id="estatus" class="form-control">
                            <option value="">Seleciona una opción</option>
                                <option value="Viaje">Viaje</option>
                                <option value="Descanso">Descanso</option>
                                <option value="Vacaciones">Vacaciones</option>
                            </select>
                            <span class="error-message" id="estatus_error" style="color:red"></span>
                            <br>
                            <br>
                            <label for="imagen">Selecciona una Fotografía:</label>
                            <input type="file" name="imagen_conductor" id="imagen_conductor" class="form-control">
                            <span class="error-message" id="imagen_error" style="color:red"></span>
                        </div>

                        <div class="modal-footer boton-modal">
                            <input type="hidden" name="id_conductor" id="id_conductor">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn-success" values="Crear">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    



    <!-- fin modal agregar-->
    <!-- modal borrar-->

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmar Borrado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de borrar este registro?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Borrar</button>
      </div>
    </div>
  </div>
</div>



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

    
<script src="./vista/recursos/js/datatables.js"></script>




</body>
</html>
