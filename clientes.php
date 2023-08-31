<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    echo "Bienvenido ". $_SESSION['name'];
    include "menu.php";

   
$servername = "localhost";
$username = "enrique";
$password = "3nri9u3";
$dbname = "vortice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Falla de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM clientes ORDER BY apellido, nombre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Correo</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["nombre"]. " ". $row["apellido"]. "</td><td>" . $row["telefono"]. "</td><td>" . $row["correo"]. "</td></tr>";
    }
} else {
    echo "0 resultados";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
} ?>