<!-- Inicialización del HTML de la página -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="estilodev.css">
    <title><?php echo "VORTICEX-3000 - ".$nombrePagina; ?></title>
</head>
<body>

<!-- Carga de variables -->

<?php
echo "<h1>Vorticex-3000 - ". $pagina. "</h1><br>";
echo "Bienvenido ". $_SESSION['name'];
    include "menu.php";
?>