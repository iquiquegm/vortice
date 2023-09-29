<?php
// Set timezone
date_default_timezone_set('America/Mexico_City');

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'enrique';
$dbPassword = '3nri9u3';
$dbName     = 'vortice';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if form is submitted
if(isset($_POST['nombre'])){
    // Get form data
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $medio = $_POST['medio'];

    // Insert data into the database
    $insert = $db->query("INSERT INTO clientes (nombre, apellido, telefono, correo, medio) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$medio')");

    //Check if data is inserted successfully
    if($insert){
        echo 'Data inserted successfully. <br>';
        echo 'Nombre: '.$nombre.'<br>';
        echo 'Apellido: '.$apellido.'<br>';
        echo 'Telefono: '.$telefono.'<br>';
        echo 'Correo: '.$correo.'<br>';
        echo 'Medio: '.$medio.'<br>';
    }else{
        echo 'Error: '.$db->error;
   }
   echo '<script type="text/javascript">';
   echo 'alert("This is an alert message!");';
   echo 'console.log("Grabado");';
   echo '</script>';
    //Redirect to clientes.php
    header('Location: clientes.php');
    exit;
}
?>
