<?php


function findUser($email, $password)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password';";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}


?>