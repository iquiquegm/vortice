<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    $pagina = basename(__FILE__, ".php");
    $nombrePagina = "Clientes";
    include "conexion.php";
    include "cabeza.php";

// $sql = "SELECT * FROM medios";
// $result = $conn->query($sql);

// $data = array(); // create an empty array

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         $data[] = $row; // add each row into the data array
//     }
// } else {
//     echo "0 results";
// }
$medios = $_SESSION['medios'];
var_dump($medios);
var_dump($_SESSION['medios']);

echo "<br>Dato: ". $medios[0][[0][0]];

$sql = "SELECT * FROM clientes ORDER BY apellido, nombre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Telefono</th><th>Correo</th><th>Como nos Encontro</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]. "<td><a href='cliente.php?cliente=". $row["ID"]. "'>" . $row["nombre"]. " ". $row["apellido"]. "</a></td><td>" . $row["telefono"]. "</td><td style='text-transform:lowercase;'>" . $row["correo"]. "</td>";

        echo "<td>" . $medios[$row["medio"]][1]. "</td></tr>";
        
        // foreach($data as $row2) {
        //     if ($row2['ID'] == $row["medio"]) {
        //         echo "<td>" . $row2["descripcion"]. "</td></tr>";
        //     }
        // }
      

        
    }
    echo"</table>";
} else {
    echo "0 resultados";
}
$conn->close();



 } else {
    echo 'Tiene que iniciar sesión.';
   
}  include "pie.php";
?>