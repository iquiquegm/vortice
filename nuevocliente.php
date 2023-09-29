<?php
session_start();
$servername = "localhost";
$username = "enrique";
$password = "3nri9u3";
$dbname = "vortice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set timezone
date_default_timezone_set('America/Mexico_City');

// Set language
setlocale(LC_ALL, 'es_ES');

if(isset($_SESSION['user_id'])) {
    echo "Bienvenido " . $_SESSION['user_name'];

    $sql = "SELECT * FROM medios";
    $result = $conn->query($sql);

    $medios = array();
    while($row = $result->fetch_assoc()) {
        $medios[] = $row;
    }

    echo '<form name="forma" action="agregacliente.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="telefono" placeholder="Telefono">
        <input type="text" name="correo" placeholder="Correo">
        <select name="medio">';
    foreach($medios as $medio) {
        echo '<option value="'.$medio['ID'].'">'.$medio['descripcion'].'</option>';
    }
    echo '</select>
        <input type="submit" value="Guardar">
        <button type="button" onclick="location.href=\'clientes.php\'">Cancelar</button>
    </form>';
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>
