<?php 

    session_start();

    include 'conexion_bd.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    //$contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE 
    correo = '$correo' and contrasena = '$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../../../../Transporta/index.php?pagina=vistaUsuario");
        exit;
    }else{
        echo '
            <script>
                alert("El usuario no existe, por favor verifique la información introducida");
                window.location = "../../../../Transporta/index.php?pagina=login";
             </script>
        ';
        exit;
    }
?>