<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
</head>
<body>
    <p><?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    echo "Bienvenido ". $_SESSION['name']; 
    include "menu.php";
    
    
    ?>
    </p>
    <ul>
        <li><a href="inventario.php">Inventario</a></li>
        <li><a href="clientes.php">Clientes</a></li>
        <li>Tickets</li>
        <li>Productos</li>
        <li>Servicios</li>
        <li>Usuarios</li>
    </ul>
    <p>
        <a href="index.php">Cerrar Sesión.</a>
    </p>





<?php } else {
    echo 'Tiene que iniciar sesión.';
} ?>
</body>
</html>