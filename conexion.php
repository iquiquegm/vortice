<?php

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

?>