<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['user_id'])) {
    $pagina = basename(__FILE__, ".php");
    $idCliente = $_GET["cliente"];
    include "conexion.php";
    $sql = "SELECT * FROM clientes WHERE ID='$idCliente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
       
        
        $nombreCliente = $row["nombre"] . " " . $row["apellido"];
        $telefono = $row["telefono"];
        $correo = $row["correo"];
        $medio = $row["medio"]; 
        $medios = $_SESSION["medios"];
        
    }
    
} else {
    echo "0 resultados";
}

$sql = "SELECT * FROM estados";
$result = $conn->query($sql);

$estados = array();
while($row = $result->fetch_assoc()) {
    $estados[] = $row;
}
$_SESSION["estados"] = $estados;

    $nombrePagina = $nombreCliente;
    //include "cabeza.php";
    echo "CLIENTE: ". $nombreCliente . "<br>";
    echo "Teléfono: ".$telefono. "<br>";
    echo "Correo: ".$correo. "<br>";
    echo "Cómo nos encontró: ".$medios[$medio - 1]["descripcion"]. "<br>";

?>
    <button onclick='window.location.href = "https://stackoverflow.com"'>Editar</button>
<?php


$sql = "SELECT * FROM tickets WHERE ID_cliente='$idCliente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "<table><tr><th>Ticket</th><th>Fecha</th><th>Estado</th><th>Total</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["ID"]. "</td><td>". $row["fecha"]. "</td><td>". $estados[$row["ID_estado"] - 1]["nombre"]. "</td><td>$". $row["total"]. ".00</td>";
        echo "<td><a href='ticket.php?ticket=". $row['ID']. "'><button>Seleccionar</button></a></td></tr>"; 
       
    }
    echo "</table>";
    
} else {
    echo "El cliente no tiene tickets.";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
}  include "pie.php";
?>