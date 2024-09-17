<?php 

    session_start();
    session_destroy();
    header("location: http://localhost:/Transporta/index.php?pagina=inicio");

?>