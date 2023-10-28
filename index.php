<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión | Animalia</title>
    </head>
    <body>
        <form action="./controllers/authController.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button>Enviar</button>
        </form>
    </body>
</html>