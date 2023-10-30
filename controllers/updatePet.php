<?php
    require '../models/pets.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $PetID = intval($_POST['PetID']);
        $Name = $_POST['Name'];
        $Age = intval($_POST['Age']);
        $Sex = $_POST['Sex'];

        if($Name){
            updatePet($PetID, $Name, $Sex, $Age);
            header('Location: ../views/pets.php');
            exit;
        }

    }