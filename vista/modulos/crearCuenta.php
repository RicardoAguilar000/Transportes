<!doctype html>
<html lang="es">

    <head>    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> CREAR CUENTA</title>    
        <link rel="stylesheet" href="<?php echo $ruta."/" ?>css/login.css">
        <style type="text/css"></style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
        
    </head>
    
    <body>
       
        
        
        <ul class="breadcrumb">
  
            <li><a href="index.php?pagina=inicio">Inicio</a></li>
            
            <li><a href="index.php?pagina=login">Iniciar sesion</a></li>
            
            <li><a href="index.php?pagina=crearCuenta">Crear cuenta</a></li>
            
          </ul>  

        <div id="contenedor">
            
         
            <div id="contenedorcentradoCrear">
                <div id="login">
                    <form id="loginform">
                        <label for="usuario">Nombre</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Nombre" required>
                        
                        <label for="apellidoPat">Apellido Paterno</label>
                        <input id="apellidoPat" type="text" name="apellidoPat" placeholder="Nombre" required>
                        
                        <label for="apellidoMat">Apellido Materno</label>
                        <input id="apellidoMat" type="text" name="apellidoMat" placeholder="Nombre" required>
                        
                        <label for="telefono">Número de teléfono</label>
                        <input id="telefono" type="number" name="numero" placeholder="5613838232" required>
                        
                        <label for="correo">Correo electrónico</label>
                        <input id="correo" type="email" name="correo" placeholder="alguien@correo.com" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                        
                        
                        <button type="submit" title="crear" name="crear">CREAR</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        TRANSPORTA
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="index.php?pagina=login">Iniciar sesión</a>
                        <hr>
                        <a href="index.php?pagina=inicio">« Volver</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>