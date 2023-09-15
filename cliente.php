<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    $pagina = basename(__FILE__, ".php");
    $idCliente = $_GET["cliente"];
    include "conexion.php";
    $sql = "SELECT * FROM clientes WHERE ID='$idCliente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
       
        
        $nombreCliente= $row["nombre"] . " " . $row["apellido"];  
    }
    
} else {
    echo "0 resultados";
}

    $nombrePagina = $nombreCliente;
    include "cabeza.php";
    echo "CLIENTE: ". $nombreCliente . "<br>";


$sql = "SELECT * FROM tickets WHERE ID_cliente='$idCliente'";
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
}  include "pie.php";
?>