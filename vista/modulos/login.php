<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INICIA SESIÓN</title>
    <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/estiloIndex.css">
    <style type="text/css"></style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
    <!--formulario login - registro-->
    <link rel="stylesheet" href="vista/recursos/css/estilosLogin/estilosform.css">
    <link rel="stylesheet" href="vista/recursos/css/estilosLogin/estilosLR.css">
    <link rel="stylesheet" href="vista/recursos/css/estilosLogin/estilos_validar.css">
    <script src="https://kit.fontawesome.com/b1bafbb908.js" crossorigin="anonymous"></script>
</head>

<body>
    <ul class="breadcrumb">

        <li><a href="index.php?pagina=inicio">Inicio</a></li>   
        <li><a href="index.php?pagina=login">Iniciar sesion</a></li>
        
    </ul>
    <br>
    <br>
    <br>
    <br>

    <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="vista/modulos/usuarios_php/login_usuario_be.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Entrar</button>
                    </form>

                    <!--Register action="php/registro_paciente_bd.php" method="POST"-->
                    <form class="formulario__register" id="formulario">
                        <h2>Regístrarse</h2>
                        
                        <!--grupo nombre-->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" placeholder="Nombre completo" name="nombre" id="nombre_completo">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">El nombre solo debe de incluir letras y espacios</p>
                        </div>

                        <!--Grupo apellido Paterno-->

                        <div class="formulario__grupo" id="grupo__apellidoPaterno">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" placeholder="Apellido Paterno" name="apellidoPaterno" id="apellidoPaterno">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">El apellido solo debe de incluir letras y espacios.</p>
                        </div>

                        <!--Grupo apellido Materno-->

                        <div class="formulario__grupo" id="grupo__apellidoMaterno">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" placeholder="Apellido Materno" name="apellidoMaterno" id="apellidoMaterno">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>  
                            <p class="formulario__input-error">El apellido solo debe de incluir letras y espacios.</p>
                        </div>

                        <!--Grupo telefono-->

                        <div class="formulario__grupo" id="grupo__telefono">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" placeholder="Telefono" name="telefono" id="telefono">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">El numero de telefono no es valido, solo ingrese digitos (max 10).</p>
                        </div>

                        <!--Grupo Correo-->

                        <div class="formulario__grupo" id="grupo__correo">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" placeholder="Correo Electronico" name="correo" id="correo">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">Ingrese un Correo valido.</p>
                        </div>

                        <!--Grupo contraseña-->
                        <div class="formulario__grupo" id="grupo__contrasena">
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" placeholder="Contraseña" name="contrasena" id="contrasena">
                                <i class="formulario__validacion-estado fa-regular fa-circle-xmark"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser de minimo 4 caracteres</p>
                        </div>

                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p><i class="fa-solid fa-triangle-exclamation"></i><b>Error:</b> Rellene el formulario por favor</p>
                        </div> 
                        
                        <div class="formulario__grupo formulario_grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Regístrarse</button>
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito"><br>Registro exitoso<br><br>¡Inicia Sesiòn!</p>
                        </div>

                    </form>
                </div>
            </div>

            <footer id="contacto">
    <div class="contenedor footer-content">
      <div class="contact-us">
        <h5 class="brand">Nos ubicamos.
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
            <!--Formulario login - registro-->
        <script src="vista/recursos/js/validarUsuario.js"></script>
        <script src="vista/recursos/js/script.js"></script>
</body>

</html>