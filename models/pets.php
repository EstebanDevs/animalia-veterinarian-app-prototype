<?php

function getUserPetsByRUT($RUT)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT 
                    tb.User_RUT_FK, ta.Pet_ID, ta.Name, ta.Genre, ta.Age, tc.Race 
                FROM pets AS ta 
                INNER JOIN users_pets AS tb 
                    ON ta.Pet_ID = tb.Pet_ID_FK 
                INNER JOIN races AS tc 
                    ON ta.Race_ID_FK = tc.Race_ID 
                WHERE tb.User_RUT_FK = $RUT;";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);

        //Cerrar la conexión a la base de datos
        $conn.close();
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

