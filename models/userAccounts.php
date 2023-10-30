<?php


function getCredentials($email, $password)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT 
                    ta.Account_ID, ta.Email, ta.Password, tb.Name'Rol'
                FROM user_accounts AS ta 
                INNER JOIN roles AS tb 
                    ON ta.Rol_ID_FK = tb.Rol_ID 
                WHERE 
                    ta.Email = '$email' 
                    AND 
                    ta.Password = '$password';";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);

        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

?>