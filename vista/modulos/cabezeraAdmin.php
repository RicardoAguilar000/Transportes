
<nav class="navbar navbar-expand-lg barra mes">

<div class="container-fluid ">
    <img class="logo ms-5" src="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end navbar-dark bg-dark " tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  ">

                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3 " aria-current="page"
                        href="index.php?pagina=login">Salir</a>
                </li>
                <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page"
                            href="index.php?pagina=ConsultaRemolque">
                            Remolque</a>
                    </li>

                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page"
                            href="index.php?pagina=ConsultaUnidad">
                            Unidades</a>
                    </li>
                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page"
                            href="index.php?pagina=ConsultaConductores">
                            Conductores</a>
                    </li>
                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=ConsultaServicios">
                        Cotizaciones</a>
                </li>
                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=ConsultaUsuarios">
                        Usuarios</a>
                </li>
                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=ConsultaViajes">
                        Viajes</a>
                </li>
                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=ConsultarPago">
                        Pagos</a>
                </li>
                
                <li class="nav-item nave">
                    <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=comentarios">
                        Comentarios</a>
                </li>

            </ul>
        </div>
    </div>
</div>

</nav>