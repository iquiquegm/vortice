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
    echo "Bienvenido ". $_SESSION['name']; ?>
    </p>
    <ul>
        <li>Inventario</li>
        <li>Clientes</li>
        <li>Tickets</li>
    </ul>
</body>
</html>