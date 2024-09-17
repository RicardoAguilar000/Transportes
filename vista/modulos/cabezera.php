


<nav class="navbar navbar-expand-lg barra mes">

        <div class="container-fluid ">
            <img class="logo ms-5" src="<?php echo $ruta."/" ?>img/Paquetería y Envíos Logo (1).png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end navbar-dark bg-dark " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">

                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  ">

                    <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=login">Acceder</a>
                      </li>
                      <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=servicios">Servicios</a>
                      </li>
                      <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=conductoresSS">Conductores</a>
                      </li>
                      <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=nuestrosClientesSS">Clientes</a>
                      </li>
                      <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=loginAdm">Admin</a>
                      </li>
                      <li class="nav-item nave">
                        <a class="nav-link active text-light fs-3" aria-current="page" href="index.php?pagina=politicas">Politicas</a>
                      </li>
                  </ul>

                  <form class="d-flex  p-2" role="search">
                  <input id="buscador" class="form-control me-2 p-2" type="text" placeholder="Buscar texto" aria-label="Search">
                    <div class="mar">
                   <img class="icon" src="<?php echo $ruta."/" ?>img/buscar.png"  >
                  </div>

                
                  </form>
                </div>
              </div>
            </div>

          </nav>


          
          
<script>
    //Buscador de contenido


document.addEventListener('keyup', e => {
    if(e.target.matches('#buscador')){
        document.querySelectorAll('.palabras').forEach(palabras =>{
            palabras.textContent.toLowerCase().includes(e.target.value.toLowerCase())
            ? palabras.classList.remove('filtro')
            : palabras.classList.add('filtro');
            
        });
    }
})

</script>



























<style>

          .icon{
  background: white;
  padding-top: 20px;
  margin-left: -20px;
  padding-bottom: 20px;
  padding-right: 10px;
  width: 15%;
  padding: auto;  
  border-radius: 5px;
    
}

</style>














          