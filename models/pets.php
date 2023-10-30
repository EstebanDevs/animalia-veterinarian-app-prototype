<?php

function getUserPetsByRUT($RUT)
{
    try{
        //Obtener conexión a la base de datos
        require '../config/dbConnection.php'; 

        //Consulta SQL
        $sql = "SELECT 
                    ta.Pet_ID, tb.User_RUT_FK, ta.Pet_ID, ta.Name, ta.Sex, ta.Age, tc.Breed 
                FROM pets AS ta 
                INNER JOIN users_pets AS tb 
                    ON ta.Pet_ID = tb.Pet_ID_FK 
                INNER JOIN breeds AS tc 
                    ON ta.Breed_ID_FK = tc.Breed_ID 
                WHERE tb.User_RUT_FK = $RUT;";

        //Ejecutar SQL
        $query = mysqli_query($conn, $sql);
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

function deletePet($id)
{
    try {
        //Obtener conexion
        require '../config/dbConnection.php';

        //Consulta SQL
        $sql = "DELETE FROM pets WHERE pet_id = $id;";

        //Ejecutar consulta
        $query = mysqli_query($conn, $sql);
        return $query;
    } catch (\Throwable $thr) {
        var_dump($thr);
    }
}

function addPet($User_RUT, $Name, $Sex, $Age){

    try {

        require '../config/dbConnection.php';

        $sql = "CALL SP_Insert_Pet($User_RUT,'$Name','$Sex',$Age);";

        $query = mysqli_query($conn, $sql);


    } catch (\Throwable $thr) {

        var_dump($thr);

    }

}

function updatePet($PetID, $Name, $Sex, $Age){
    try {

        require '../config/dbConnection.php';

        $sql = "UPDATE pets SET 
                    Name='$Name', Sex='$Sex', Age=$Age 
                WHERE Pet_ID=$PetID;";

        $query = mysqli_query($conn, $sql);


    } catch (\Throwable $thr) {

        var_dump($thr);

    }
}