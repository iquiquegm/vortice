<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();

$pagina = basename(__FILE__, ".php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>VORTICEX-3000 - LOGIN</title>
</head>

<body>
    <?php echo "<h1>". $pagina. "</h1>"; ?>
    <h1>Vorticex-3000</h1>
    <form action="validar.php" method="post">
        Usuario:
        <input type="text" class="campotexto" name="username" id="user"><br>
        Contraseña:
        <input type="password" class="campotexto" name="password" id="psswrd"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>