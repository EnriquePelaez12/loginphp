<?php session_start();
require 'controller/config.php';
require 'fuctions.php';

$errores = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario = $_POST['usuario'];
    $password =$_POST['password'];
    $password = sha1($password); 

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password
    ]);
    $resultado = $statement->fetch();

    if($resultado !== false){
        $_SESSION['usuario']= $usuario;
        header('Location: validate.php');
    }else{
        $errores .= '<li class="error">Usuario o Contraseña incorrecto </li>';
    }
}
require 'views/login.view.php';
?>