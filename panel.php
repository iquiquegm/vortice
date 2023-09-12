<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
$pagina = basename(__FILE__, ".php");

    include "cabeza.php";
    echo "<title>VORTICEX-3000 - PANEL DE CONTROL</title>";
    echo "<h1>Vorticex-3000 - Panel de Control</h1><br>";

    
    
 } else {
    echo 'Tiene que iniciar sesión.';
} 
include "pie.php";
?>