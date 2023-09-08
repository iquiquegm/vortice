<?php
session_start();

include "estilo.html";

$host = "localhost";
$dbUsername = "enrique";
$dbPassword = "3nri9u3";
$dbname = "vortice";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User input
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query
$sql = "SELECT * FROM Usuarios WHERE usuario = ? AND password = ?";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if user exists
if($result->num_rows > 0) {
    // Fetch the user data
    $user = $result->fetch_assoc();

    // Set the session
    $_SESSION['name'] = $user['nombre'];
     // Redirect to panel.php
     header('Location: panel.php');
     exit;

} else {
    echo "Usuario o contraseña no válida.";
}

$stmt->close();
$conn->close();
?>