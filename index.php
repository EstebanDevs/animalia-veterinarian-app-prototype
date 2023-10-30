<?php
    require 'pets.php';
    // Fixed RUT to test
    $getUserPet =  getUserPetsByRUT(238923984);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="views/petstyles.css">
    
    <!-- importados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
</head>


<body>
    <header>
        <div class="logo">
            <img src="views/resources/logo.png" alt="Logo" id="header_img">
            <h1 id="header_title">Animalia</h1>
        </div>

        <nav class="nav">
            <a href="#">Contacto</a>
            <a href="#">About Us</a>
        </nav>

    </header>

   
    <!-- to contain and control the cards -->
    <main id="cardmain">
        <!--🙌🏽 para ver el formulario, remover la clase 'hide'-->
        <aside class="formdiv">
            <h1 class="form_title">Conozcamos a tu peludito</h1>
            <p>¡Cuéntanos un poco sobre tu mascota para poder crear su ficha!</p>
            <form action="-" method="post" id="pet_form">
                  <input type="text" class="form_field" name="nombre" required placeholder="Nombre"><br><br>
              
                <div class="form_radio">
                  <label>Sexo:</label>
                  <input type="radio" id="macho" name="sexo" value="Macho">
                  <label for="macho">Macho</label>
                  <input type="radio" id="hembra" name="sexo" value="hembra">
                  <label for="hembra">Hembra</label><br><br>
                </div>

                  <input type="number" class="form_field" name="edad" required pattern="\d+" placeholder="Edad"><br><br>
            
                  <input type="text" class="form_field" id="raza" name="raza" placeholder="Raza"><br><br>
              
                  <!-- <input type="text" class="form_field" name="color" class="form_field" placeholder="Color"><br><br> -->
              
                    <!-- 🐱‍👤tipo de animal y registro medico pendientes -->
                  <!-- <label for="enfermedad">¿Tiene alguna enfermedad?</label>
                  <textarea id="enfermedad" name="enfermedad"></textarea><br><br> -->
              
                  <input type="submit" value="Enviar" class="form_submit">
            </form> 
        </aside>
    

        <?php 
            while($pet = mysqli_fetch_assoc($getUserPet)){ ?>
            
            <div class="card">
                <img src="views/resources/dog.png" alt="foto" class="card-img">
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
                <i onClick="deletePost(this)" class="fas fa-trash-alt"></i>
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