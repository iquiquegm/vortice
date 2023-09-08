
<body>
    <p><?php
    include "estilo.html";
    session_start();

    // Check if the session variable is set
if(isset($_SESSION['name'])) {
    echo "Bienvenido ". $_SESSION['name']; 
    include "menu.php";
    
    
    ?>
    </p>
    

<?php } else {
    echo 'Tiene que iniciar sesión.';
} ?>
</body>
</html>