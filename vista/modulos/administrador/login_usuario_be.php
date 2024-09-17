<?php 

    session_start();

    include 'conex_bd.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];


    $validar_login = mysqli_query($conexion, "SELECT * FROM administrador WHERE 
    correo = '$correo' and contrasena = '$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../../../../Transporta/index.php?pagina=ConsultaServicios");
        exit;
    }else{
        echo '
            <script>
                alert("El usuario no existe, por favor verifique la información introducida");
                window.location = "../../../../Transporta/index.php?pagina=loginAdm";
             </script>
        ';
        exit;
    }
?>