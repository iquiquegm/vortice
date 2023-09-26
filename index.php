<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "enrique";
$password = "3nri9u3";
$dbname = "vortice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Conexión fallida: ". $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password against the database
    $sql = "SELECT id, nombre, nombre FROM usuarios WHERE usuario='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If the credentials are correct, set session variables and redirect to the panel page
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["nombre"];
        header("Location: panel.php");
        exit();
    } else {
        // If the credentials are incorrect, show an error message
        $error = "Usuario o contraseña incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>VORTICEX 3000</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)) {?>
        <p><?php echo $error;?></p>
    <?php }?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Usuario:</label>
        <input type="text" name="username"><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
