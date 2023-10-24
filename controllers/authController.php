<?php
    require '../models/user.php';

try {
    //Encontrar al usuario
    $user = find_user($email, $password);
    
    //Acreditar que si el usuario existe en la base de datos
    if(!$user){
        include '../index.php';
    } else {
        include '../views/pets.php';
    }
} catch(\Throwable $error) {
    var_dump($error);
}