<?php
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    $pagina = basename(__FILE__, ".php");
    $nombrePagina = "Menu Principal";
    include "cabeza.php";
    include "conexion.php";

    $sql = "SELECT * FROM medios";
    $result = $conn->query($sql);
    
    $datas = array(); // create an empty array
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row; // add each row into the data array
        }
        $_SESSION['medios'] = $data;
    } else {
        echo "0 results";
    }
    


} else {
    echo 'Tiene que iniciar sesion.';
} 
include "pie.php";
?>