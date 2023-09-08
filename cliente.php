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
$id=$_GET["cliente"];

$sql = "SELECT * FROM clientes WHERE ID='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["nombre"]. " ". $row["apellido"]. "</h1><br>";
        
       
    }
    
} else {
    echo "0 resultados";
}


$sql = "SELECT * FROM tickets WHERE ID_cliente='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "<table><tr><th>Ticket</th><th>Fecha</th><th>Estado</th><th>Total</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["ID"]. "</td><td>". $row["fecha"]. "</td><td>". $row["ID_estado"]. "</td><td>$". $row["total"]. ".00</td>";
        echo "<td><a href='ticket.php?ticket=". $row['ID']. "'><button>Seleccionar</button></a></td></tr>"; 
       
    }
    echo "</table>";
    
} else {
    echo "0 resultados";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
} ?>