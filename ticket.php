<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    echo "Bienvenido ". $_SESSION['name'];
    include "estilo.html";
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
$id=$_GET["ticket"];

$sql = "SELECT * FROM tickets WHERE ID='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
    while($row = $result->fetch_assoc()) {
        echo "<h1>Ticket: " . $row["ID"]. "</h1>";
        echo "<table><tr><th>Fecha</th><th>Total</th></tr>";
        echo "<tr><td>". $row["fecha"]. "</td><td>$". $row["total"]. ".00</td></tr></table>";
       
    }
    
} else {
    echo "0 resultados";
}


$sql = "SELECT * FROM trabajos WHERE ticket='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "<table><tr><th>ID</th><th>Concepto</th><th>Precio</th><th>Descripción</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["ID"]. "</td><td>". $row["concepto"]. "</td><td>$". $row["precio"]. ".00</td><td>". $row["descripcion"]. "</td>";
        echo "<td><a href='#'><button>Editar</button></a></td></tr>"; 
       
    }
    echo "</table>";
    
} else {
    echo "0 resultados";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
} ?>