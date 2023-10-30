<?php
    //Traer los metodos para interactuar con el modelo de pets y los usuarios
    require '../models/pets.php';

    //Continuar sesión
    session_start();

    //Validar si quien accede esta loggeado
    if(!isset($_SESSION['RUT'])){
        //no esta loggeado entonces se le envia al login 
        header("Location: ../index.php");
        exit;
    }
    //Esta loggeado

    //Logica para eliminar una mascota 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = filter_var($_POST['Pet_ID'], FILTER_VALIDATE_INT);
        if ($id) {
            deletePet(intval($id));
        }
        //Vuelve a actualizar la lista de mascotas
        $getUserPet =  getUserPetsByRUT($_SESSION['RUT']);
    }

    //Obtener las mascotas que pertenecen al usuario de la sesión actual
    $userPets = getUserPetsByRUT($_SESSION['RUT']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="./styles/petstyles.css">   
    <!-- importados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>
    <header>
        <div class="logo">
            <img src="./resources/logo.png" alt="Logo" id="header_img">
            <h1 id="header_title">Animalia</h1>
        </div>

        <nav class="nav">
            <a href="#">Contacto</a>
            <a href="#">Sobre nosotros</a>
            <a href="../controllers/logOut.php">Cerrar sesión</a>
        </nav>

    </header>
   
    <!-- to contain and control the cards -->
    <main id="cardmain">
        <!--🙌🏽 para ver el formulario, remover la clase 'hide'-->
        <aside class="formdiv hide">
            <h1 class="form_title">Conozcamos a tu peludito</h1>
            <p>¡Cuéntanos un poco sobre tu mascota para poder crear su ficha!</p>
            <form action="../controllers/addPet.php" method="post" id="pet_form">
                  <input type="text" class="form_field" name="Name" required placeholder="Nombre"><br><br>
              
                <div class="form_radio">
                  <label>Sexo:</label>
                  <input type="radio" id="macho" name="Sex" value="Macho">
                  <label for="macho">Macho</label>
                  <input type="radio" id="hembra" name="Sex" value="Hembra">
                  <label for="hembra">Hembra</label><br><br>
                </div>

                  <input type="number" class="form_field" name="Age" required pattern="\d+" placeholder="Edad"><br><br>
            
                  <!-- <input type="text" class="form_field" id="raza" name="Raza" placeholder="Raza"><br><br> -->
              
                  <!-- <input type="text" class="form_field" name="color" class="form_field" placeholder="Color"><br><br> -->
              
                    <!-- 🐱‍👤tipo de animal y registro medico pendientes -->
                  <!-- <label for="enfermedad">¿Tiene alguna enfermedad?</label>
                  <textarea id="enfermedad" name="enfermedad"></textarea><br><br> -->
              
                  <input type="submit" value="Enviar" class="form_submit">
            </form> 
        </aside>

        <!--🙌🏽 para ver el formulario de actualización, remover la clase 'hide'-->
        <aside class="formdiv">
            <h1 class="form_title">¿Cometiste algún error al rellenar la ficha de tu mascota?</h1>
            <p>No te preocupes, actualiza los campos a continuación para corregirlo.</p>
            <form action="../controllers/updatePet.php" method="post" id="pet_form" class="updateForm">
                  <input type="text" class="form_field" name="Name" required placeholder="Nombre"><br><br>
                    <input type="number" name="PetID" id="PetID" value='' hidden>
                <div class="form_radio">
                  <label>Sexo:</label>
                  <input type="radio" id="macho" name="Sex" value="Macho">
                  <label for="macho">Macho</label>
                  <input type="radio" id="hembra" name="Sex" value="Hembra">
                  <label for="hembra">Hembra</label><br><br>
                </div>

                  <input type="number" class="form_field" name="Age" required pattern="\d+" placeholder="Edad"><br><br>
            
                  <!-- <input type="text" class="form_field" id="raza" name="Raza" placeholder="Raza"><br><br> -->
              
                  <!-- <input type="text" class="form_field" name="color" class="form_field" placeholder="Color"><br><br> -->
              
                    <!-- 🐱‍👤tipo de animal y registro medico pendientes -->
                  <!-- <label for="enfermedad">¿Tiene alguna enfermedad?</label>
                  <textarea id="enfermedad" name="enfermedad"></textarea><br><br> -->
              
                  <input type="submit" value="Actualizar" class="form_submit">
            </form> 
        </aside>
    

        <?php 
            while($pet = mysqli_fetch_assoc($userPets)){ ?>
            
            <div class="card">
                <img src="./resources/dog.png" alt="foto" class="card-img">
                <div class="card-details">
                    <h1 class="card-details_name">
                        <?php echo $pet['Name'];?>
                    </h1>
                    <p class="card-details_description">
                        <?php echo $pet['Name'];?>, 
                        <?php echo $pet['Sex'];?>
                        de <?php echo $pet['Age'];?> años
                        de raza <?php echo $pet['Breed'];?> 
                    </p>
                </div>

                <aside class="card-options">
                    <i onClick="editPost(this)" class="fas fa-edit"></i>
                    <!-- <i onClick= "deletePets(<?php //echo $pet['pet_id']; ?>)"  class="fas fa-trash-alt"></i> -->
                    <form method="post">
                    <!-- action="index?mensaje=Entrada eliminada correctamente!" -->
                        <input type="hidden" name="Pet_ID" value="<?php echo $pet['Pet_ID'];?>">
                        <button type="submit" class="fa fa-trash icon-btn"></button>
                    </form> 
                </aside>
            </div> 
            <?php } ?>  
    </main>

        <!-- 🐱‍👤 (otra cosa que no logre decifrar, igual que mi vida jasj)el beat solo con el hover -->
    <div class="addbtn">
        <!-- <span class="material-symbols-outlined btn_heart">
        favorite</span> -->
        <p class='btn_element'><strong>+</strong></p>
    </div>
    
</body>
</html>