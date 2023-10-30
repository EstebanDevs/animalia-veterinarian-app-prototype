<?php

    require '../models/pets.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Name = $_POST['Name'];
        $Age = intval($_POST['Age']);
        $Sex = $_POST['Sex'];

        if($Name){
            addPet($_SESSION['RUT'], $Name, $Sex, $Age);
            header('Location: ../views/pets.php');
            exit;
        }

    }