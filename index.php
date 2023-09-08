<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();

include "estilo.html";
?>


<body>
    <h1>Vortice 3Di - Sistema de Control</h1>
    <form action="validar.php" method="post">
        Usuario:
        <input type="text" name="username" id="user"><br>
        Contraseña:
        <input type="password" name="password" id="psswrd"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>