<?php session_start();

 require 'controller/config.php';
 require 'fuctions.php';
 //comprobar sesion
 if (!isset($_SESSION['usuario'])) {

    header('Location: login.php');
 }


  //validar los datos por provilegios para que no pueda entrar a las rutas
  $conexion = conexion($bd_config);
  $user = iniciarSession('usuarios', $conexion);

  if ($user['tipo_usuario'] == 'usuario') {
      require 'views/usuario.view.php';
  }else{
      header('Location: validate.php');
  }


?>