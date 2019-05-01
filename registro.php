<?php session_start();
 
require 'controller/config.php';
require 'fuctions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $password = sha1($password); 
    $rol = $_POST['rol'];

    $errores = '';

    //validacion de campos de texto


    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }else{
        //validacion de que usuario existe
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute([
            ':usuario' => $usuario
            ]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error"> Este usuario ya existe</li>';
            # code...
        }


    }

    if ($errores == '') {
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario)
        VALUES(null, :usuario, :password, :tipo_usuario)');
        $statement->execute([
            ':usuario' => $usuario,
            ':password' => $password,
            ':tipo_usuario' => $rol
        ]);
        
       header('Location: login.php');
    }

}



require 'views/registro.view.php';

?>