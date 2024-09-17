<?php 

	$conexion=mysqli_connect('localhost','root','','transporta_bd');

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


    <title>Consulta Usuarios</title>
</head>
<ul class="breadcrumb ">
    <li><a href="index.php?pagina=inicio">Inicio</a></li>
    <li><a href="index.php?pagina=ConsultaConductores">Consulta usuarios</a></li>

</ul>

<body>

    <header>

        <?php 
    include "cabezeraAdmin.php"; 

    
    ?>


    </header>

    <div class="titulo">
        <span>
            <h1>TABLA DE USUARIOS</h1>
        </span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-2 offset-10">
            </div>
        </div>

<body>
<?php

if (isset($_GET['limit'])) {
  $limit = $_GET['limit'];
} else {
  $limit = 10; // Establecer un límite predeterminado si no se selecciona ningún valor
}
?>
  
<!-- Botones para seleccionar el número de entradas a mostrar -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <select name="limit">
        <option value="10" <?php if ($limit == 10) echo "selected"; ?>>10 entradas</option>
        <option value="15" <?php if ($limit == 15) echo "selected"; ?>>15 entradas</option>
        <option value="20" <?php if ($limit == 20) echo "selected"; ?>>20 entradas</option>
    </select>
</form>

    <div class="table-responsive">

   
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Nombre</th>
        <th scope="col">Apellido Paterno</th>
        <th scope="col">Apellido Materno</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Opciones</th>

    </tr>
  </thead>
  <tbody>

  <?php 
		$sql="SELECT * from usuarios LIMIT $limit";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>

    <form method="post" action="./index.php?pagina=borrarUsuario"> 
            <td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['apellidoPaterno'] ?></td>
            <td><?php echo $mostrar['apellidoMaterno'] ?></td>
			<td><?php echo $mostrar['telefono'] ?></td>
			<td><?php echo $mostrar['correo'] ?></td>
      <?php
           echo '<input type="hidden" value="'.$mostrar['idUsuario'].'" name="idUsuario"> ';
        ?>
            <td><button class="btn btn-danger">Eliminar</button>
        </td>
        </form>
		</tr>
	<?php 
	}

	 ?>
  </tbody>
</table>

            
    </div>
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

</div>
<footer id="contacto">
    <div class="contenedor footer-content">
      <div class="contact-us">
        <h5 class="brand">Nosotros lo llevamos.
        </h5>
        <p>Transportistas 15, Chinam Pac de Juárez, Iztapalapa, 09208 Ciudad de México, CDMX</p>
      </div>

      <div class="social-media">
        <a href="https://www.facebook.com/profile.php?id=100093149917487&is_tour_dismissed=true"
          class="social-media-icon">
          <i class="bx bxl-facebook"></i>
        </a>
        <a href="https://instagram.com/transportaoficial?igshid=MzRlODBiNWFlZA==" class="social-media-icon">
          <i class="bx bxl-instagram"></i>
        </a>
        <a href="https://twitter.com/TRANSPORTA_OF" class="social-media-icon">
          <i class='bx bxl-twitter'></i>
        </a>
      </div>
    </div>
    <div class="line"></div>
    <h5 class="text-center text-light">© 2023 Transporta</h5>
  </footer>






    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    
<script src="./vista/recursos/js/datatables.js"></script>

    



</body>
</html>