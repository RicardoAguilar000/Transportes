<?php
$idUsuario = $_REQUEST['idUsuario'];

$cnx = mysqli_connect("localhost", "root", "", "transporta_bd");
$sql = "DELETE FROM usuarios WHERE idUsuario = '$idUsuario'";
$rta = mysqli_query($cnx, $sql);

echo'<script type="text/javascript">
            alert("usuario Borrado Exitosamente");
             window.location.href="./index.php?pagina=ConsultaUsuarios";
             </script>';


?>