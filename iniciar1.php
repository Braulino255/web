<html><head>
 <title>Problema</title>
</head>
<body>
<?php
  // Conexión a la base de datos
  $conn = mysqli_connect("localhost", "root", "usbw", "examen3") or
    die("Problemas con la conexión");

  // Obtener los datos del formulario
  $email1 = $_POST['Email'];
  $contrasena = $_POST['contrasena'];

  // Consulta para verificar el usuario o el correo y la contraseña
  $sql = "SELECT * FROM registro3 WHERE (email1 = '$email1') AND contrasena = '$contrasena'";
  $result = mysqli_query($conn, $sql);

  // Verificar si la consulta fue exitosa 
  if ($result) {
      // Verificar si se encontró un resultado
      if (mysqli_num_rows($result) >= 1) {
          // Guardar información del usuario en la sesión
          session_start();
          $logged_user = mysqli_fetch_assoc($result);
          $_SESSION['email1'] = $logged_user['email1'];

          // Redirigir a la página deseada
          header("Location: programar3.html");
          exit();
      } else {
          // Si no se encuentra el usuario, mostrar mensaje y botón para volver a intentar
          echo "<h2>Usuario no encontrado.</h2>";
          echo "<p>Por favor, verifica tus credenciales.</p>";
          echo "<form action='clientes1.html' method='post'>";
          echo "<button type='submit'>Volver</button>";
          echo "</form>";
      }
  } else {
      // Mostrar un mensaje de error si la consulta falló
      echo "<h2>Error en la consulta a la base de datos.</h2>";
      echo "<p>" . mysqli_error($conn) . "</p>";
  }

  // Cerrar conexión
  mysqli_close($conn);
  ?>
</body>
</html>