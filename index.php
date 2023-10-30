<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./views/styles/styles.css">
</head>
<body>
  <div id="login-container">
    <div id="logo">
      <img src="./views/resources/pata-de-perro.png" alt="Logo de Animalia">
    </div>
    <form class="login-form" action="./controllers/authController.php" method="post">
      <label for="username">Correo:</label>
      <div class="input-container">
        <input type="text" id="email" name="email" required>
      </div>

      <label for="password">Contraseña:</label>
      <div class="input-container">
        <input type="password" id="password" name="password" required>
      </div>

      <input type="submit" value="Iniciar sesión" class="login-button">
    </form>
  </div>
</body>
</html>
