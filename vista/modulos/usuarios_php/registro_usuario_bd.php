<?php 

    //include 'conexion_be.php';

    $nombre_completo = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : '';
    $apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
    //$ran_id = rand(time(), 100000000);
    //encriptar contraseña $contrasena = hash('sha512', $contrasena);
    //$encrypt_pass = hash('sha512', $contrasena);
    
    try{
        $conexion = new PDO('mysql:host=localhost;port=3306;dbname=transporta_bd', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        //echo json_decode('conectado correctamente');
        $pdo = $conexion->prepare('INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, telefono, correo, contrasena) 
              VALUES(?, ?, ?, ?, ?, ?)');


              
        $pdo->bindParam(1, $nombre_completo);
        $pdo->bindParam(2, $apellidoPaterno);
        $pdo->bindParam(3, $apellidoMaterno);
        $pdo->bindParam(4, $telefono);
        $pdo->bindParam(5, $correo);
        $pdo->bindParam(6, $contrasena);
        $pdo->execute() or die(print($pdo->errorInfo()));

        echo json_encode('true');

        
    }catch(PDOException $error){
        echo $error->getMessage();
        die();
    }


    /*include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['codigoPostal'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    //encriptar contraseña 
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO pacientes (nombre_completo, telefono, ciudad, codigo_postal, correo, contrasena) 
              VALUES('$nombre_completo', '$telefono', '$ciudad', '$codigoPostal', '$correo', '$contrasena')";

    /*validar que no se repitan correos en la BD

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM doctores WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script> 
                alert("Este correo ya existe, verifica de nuevo");
                window.location = "../login_registro_paciente.php";
            </script>
        ';
        exit();
    }   

    $ejecutar =  mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Registro exitoso");
                window.location = "../login_registro_paciente.php";
             </script>
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, revisa la información");
                window.location = "../login_registro_paciente.php";
             </script>
        ';
    }

    mysqli_close($conexion);*/
    
?>