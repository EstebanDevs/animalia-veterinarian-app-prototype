<?php

function getUserPets($userRUT)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT * FROM users_pets WHERE User_RUT_FK = $userRUT;";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

