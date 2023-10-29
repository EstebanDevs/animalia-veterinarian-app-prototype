<?php

function getUserPetsByRUT($RUT)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT 
                    tb.User_RUT_FK, ta.Pet_ID, ta.Name, ta.Sex, ta.Age, tc.Breed 
                FROM pets AS ta 
                INNER JOIN users_pets AS tb 
                    ON ta.Pet_ID = tb.Pet_ID_FK 
                INNER JOIN breeds AS tc 
                    ON ta.Breed_ID_FK = tc.Breed_ID 
                WHERE tb.User_RUT_FK = 238923984;";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);

        //Cerrar la conexión a la base de datos
        $conn.close();
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

