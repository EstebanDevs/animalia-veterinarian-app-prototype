<?php

require 'dbConnection.php';
require 'pets.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = $_POST['Name'];
    $Age = intval($_POST['Age']);
    $Sex = $_POST['Sex'];
    echo $Name;
    echo gettype($Age);

    if($Name){
        addPet(238923984, $Name, $Sex, $Age);
        echo 'got here';
    }
}

?>