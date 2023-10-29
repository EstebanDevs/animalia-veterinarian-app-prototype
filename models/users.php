<?php

function getUserByAccountID($AccountID){
    try{
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sqlUser = "SELECT * FROM users WHERE User_account_ID_FK = $AccountID;";

        //Ejecutar SQL
        $queryA = mysqli_query($conn, $sqlUser);
        
        return $queryA;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}