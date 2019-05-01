<?php session_start();

require 'controller/config.php';
require 'fuctions.php';

session_destroy();

header ('Location: login.php');


?>