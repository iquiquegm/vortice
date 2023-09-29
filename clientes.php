<?php
// Set timezone
date_default_timezone_set('America/Mexico_City');

// Set language
setlocale(LC_ALL, 'es_ES');

// Database connection
$mysqli = new mysqli('localhost', 'enrique', '3nri9u3', 'vortice');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Start session
session_start();

if (isset($_SESSION['user_id'])) {
    // Display welcome message
    echo "Bienvenido, " . $_SESSION['user_name'];

    // Import table medios into array
    $result = $mysqli->query("SELECT * FROM medios");
    $medios = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION["medios"] = $medios;

    // Display a link
    echo "<a href='nuevocliente.php'>Nuevo Cliente</a>";

    // Query to fetch data from clientes
    $result = $mysqli->query("SELECT * FROM clientes ORDER BY nombre, apellido");
    if ($result->num_rows > 0) {
        echo "<table>";
        while($row = $result->fetch_assoc()) {
            $medioDescripcion = '';
            foreach ($medios as $medio) {
                if ($medio['ID'] == $row['medio']) {
                    $medioDescripcion = $medio['descripcion'];
                    break;
                }
            }
            echo "<tr>";
            echo "<td><a href='cliente.php?cliente=".$row['ID']."'>".$row['nombre']." ".$row['apellido']."</a></td>";
            echo "<td>".$row['telefono']."</td>";
            echo "<td>".$row['correo']."</td>";
            echo "<td>".$medioDescripcion."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    // Redirect to index.php
    header("Location: index.php");
    exit;
}
?>
