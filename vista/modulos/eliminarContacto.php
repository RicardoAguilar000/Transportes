<?php
$idContacto = $_REQUEST['idContacto'];

$cnx = mysqli_connect("localhost", "root", "", "transporta_bd");
$sql = "DELETE FROM contacto WHERE idContacto = '$idContacto'";
$rta = mysqli_query($cnx, $sql);

echo'<script type="text/javascript">
            alert("Comentario Borrado Exitosamente");
             window.location.href="./index.php?pagina=comentarios";
             </script>';


?>