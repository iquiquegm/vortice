<?php
// Start the session
session_start();

// Check if the session ID exists
if (isset($_SESSION['user_id'])) {
    // If the session ID exists, display a welcome message with the user's name, a link to clientenuevo.php, and a table with the user's name, last name, phone number, and email sorted by name and last name
    echo "<h1>Bienvenido, ". $_SESSION['user_name']. " ". $_SESSION['apellido']. "!</h1>";
    echo "<a href='clientenuevo.php'>Agregar nuevo cliente</a>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Correo</th><th>Como se enteró</th></tr>";
    $servername = "localhost";
    $username = "enrique";
    $password = "3nri9u3";
    $dbname = "vortice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM clientes ORDER BY nombre, apellido";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["nombre"]. "</td><td>". $row["apellido"]. "</td><td>". $row["telefono"]. "</td><td>". $row["correo"]. "</td></tr>". $medios[$row["correo"]][1]. "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    echo "</table>";
} else {
    // If the session ID does not exist, redirect to index.php
    header("Location: index.php");
    exit();
}
?>
