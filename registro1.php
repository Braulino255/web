<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "examen3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email1 = $_POST['Email'];
    $contrasena = $_POST['contrasena'];

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO registro3 (email1,contrasena)
            VALUES ('$email1', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='index.html'>Iniciar sesión</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>