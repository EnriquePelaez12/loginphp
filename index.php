<?php session_start();
 //importaciondes
 require 'controller/config.php';
 require 'fuctions.php';

 if (!isset($_SESSION['usuario'])) {

    header('Location: login.php');
 }
/* 

 //validar los datos por provilegios
 $conexion = conexion($bd_config);
 $usuario = iniciarSession('usuarios', $conexion);

// print_r($usuario['tipo_usuario']);

 if ($usuario ['tipo_usuario'] == 'administrador') {
    header('Location: admin.php');
 }elseif($usuario['tipo_usuario'] == 'usuario'){
    header('Location: usuario.php ');
 }else{
    header('Location: login.php');
 }

 */
?>

<h1>index ahora </h1> 