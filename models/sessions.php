<?php


function getSession($email, $password)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT * FROM sessions WHERE Email = '$email' AND Password = '$password';";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);
        
        //Cerrar la conexión a la base de datos
        $conn.close();
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}


?>