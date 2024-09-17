<?php 


$ruta = Plantilla::ctrRuta();


?>


    <?php 


if(isset($_GET["pagina"])){




    if($_GET["pagina"] == "inicio"){

        include "modulos/index.php";

    }
    
    if($_GET["pagina"] == "conductores"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "conductoresSS"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "vistaUsuario"){


        include "modulos/".$_GET["pagina"].".php";

    }
    if($_GET["pagina"] == "nuestrosClientesUsuario"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "nuestrosClientesSS"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "vistaCotizacionesUsuario"){


        include "modulos/".$_GET["pagina"].".php";

    }

    

    
    


    if($_GET["pagina"] == "ConsultaConductores"){


        include "modulos/".$_GET["pagina"].".php";

    }
    
    if($_GET["pagina"] == "vistaFecha"){


        include "modulos/".$_GET["pagina"].".php";

    }
    if($_GET["pagina"] == "ConsultaRemolque"){


        include "modulos/".$_GET["pagina"].".php";

    }
    if($_GET["pagina"] == "ConsultaUnidad"){


        include "modulos/".$_GET["pagina"].".php";

    }


    if($_GET["pagina"] == "ConsultaServicios"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "ConsultaViajes"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "ConsultaUsuarios"){


        include "modulos/".$_GET["pagina"].".php";

    }
    if($_GET["pagina"] == "ConsultarPago"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "Cotizacion"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "crearCuenta"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "login"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "servicios"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "serviciosUsuario"){


        include "modulos/".$_GET["pagina"].".html";

    }
    if($_GET["pagina"] == "pago"){


        include "modulos/".$_GET["pagina"].".php";

    }


//Cris


    if($_GET["pagina"] == "loginAdm"){


        include "modulos/".$_GET["pagina"].".php";

    }


    if($_GET["pagina"] == "comentarios"){


        include "modulos/".$_GET["pagina"].".php";

    }

    if($_GET["pagina"] == "borrarUsuario"){


        include "modulos/".$_GET["pagina"].".php";

    }

if($_GET["pagina"] == "eliminarContacto"){


        include "modulos/".$_GET["pagina"].".php";

    }

   

}



//politicas

if($_GET["pagina"] == "politicas"){


    include "modulos/".$_GET["pagina"].".html";

}