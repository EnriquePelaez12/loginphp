<?php session_start();
 //comprobar sesion
 require 'controller/config.php';
 require 'fuctions.php';

 if (isset($_SESSION['usuario'])) {


 //validar los datos por provilegios
 $conexion = conexion($bd_config);
 $usuario = iniciarSession('usuarios', $conexion);

 if ($usuario ['tipo_usuario'] == 'administrador') {
    header('Location: admin.php');
 }elseif($usuario['tipo_usuario'] == 'usuario') {
    header('Location: usuario.php ');
 }else{
    header('Location: login.php');
 }

 }else{
   header('Location: login.php');
}
 

?>