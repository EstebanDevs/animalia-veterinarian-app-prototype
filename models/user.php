<?php

function getUserByAccountID($AccountID){
    try{
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT * FROM users WHERE User_account_ID_FK = $AccountID;";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}