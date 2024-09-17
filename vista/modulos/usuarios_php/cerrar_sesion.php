<?php 

    session_start();
    session_destroy();
    header("location: ../../../../Transporta/index.php?pagina=inicio");

?>