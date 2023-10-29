<?php
    //Continuar sesión
    session_start();

    //Validar si quien accede esta loggeado
    if(!isset($_SESSION['RUT'])){
        //no esta loggeado entonces se le envia al login 
        header("Location: ../index.php");
        exit;
    }
    //Esta loggeado 
    //Traer los metodos para interactuar con el modelo de pets y los usuarios
    require '../models/pets.php';

    //Obtener las mascotas que pertenecen al usuario de la sesión actual
    $userPets = getUserPetsByRUT($_SESSION['RUT']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_SESSION['Name']; ?>
    <?php echo $_SESSION['Surname']; ?>
    <?php while ($card = mysqli_fetch_assoc($userPets)) {?>
        <div> 
            <p><?php echo $card['Name'];?></p>
            <p><?php echo $card['Genre'];?></p>
            <p><?php echo $card['Age'];?></p>
            <p><?php echo $card['Race'];?></p>
        </div>
    <?php } ?>
</body>
</html>