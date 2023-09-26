<?php
session_start();

if(!isset($_SESSION['user_id'])) { // check if the user_id session variable is not set
  header("Location: index.php"); // redirect to index.php
  exit(); // stop the script from executing further
}

if(isset($_SESSION['user_name'])) { // check if the user_name session variable is set
  echo "¡Bienvenido, ". $_SESSION['user_name']. "!"; // display the user_name session variable
}

if(isset($_GET['logout']) && $_GET['logout'] == 'true') { // check if the logout link is used and the value of the 'logout' parameter is 'true'
  session_unset(); // unset all session variables
  session_destroy(); // destroy the session
  header("Location: index.php"); // redirect to index.php
  exit(); // stop the script from executing further
}

include "menu.php";

echo "<br><br><a href='?logout=true'>Cerrar Sesión</a>"; // display a link to logout and set the value of the 'logout' parameter to 'true'
?>