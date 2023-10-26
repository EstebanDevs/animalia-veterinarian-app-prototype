<?php

function getUserPets(){
    //Obtener la sesión actual y llamar los metodos del modelo de pets
    require '../models/pets.php';

    //Consultar la tabla pets
    $userPetsQuery = getUserPetsByRUT($_SESSION['RUT']);

    //Devolver los resultados de la consulta a la tabla pets
    return $userPetsQuery;
}

function search_pet_by_id($id){

}

function add_pet($name, $owner, $raze, $details){

}

function delete_pet_by_id($id){

}