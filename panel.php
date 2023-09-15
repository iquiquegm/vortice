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
    
    
    
    if ($result->num_rows > 0) {
        $medios = array();
        while($row = $result->fetch_assoc()) {
          $medios[$row["ID"]] = $row["descripcion"];
        }
        $_SESSION["medios"] = $medios;
      } else {
        echo "0 results";
    }
    


} else {
    echo 'Tiene que iniciar sesion.';
} 

include "pie.php";
?>