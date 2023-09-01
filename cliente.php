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
$id=$_GET["cliente"];

$sql = "SELECT * FROM clientes WHERE ID='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["nombre"]. " ". $row["apellido"]. "</h1>";
        
       
    }
    
} else {
    echo "0 resultados";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
} ?>