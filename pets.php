<?php

function getUserPetsByRUT($RUT)
{
    try{

        require 'dbConnection.php'; 

        $sql = "SELECT 
                    tb.User_RUT_FK, ta.Pet_ID, ta.Name, ta.Sex, ta.Age, tc.Breed 
                FROM pets AS ta 
                INNER JOIN users_pets AS tb 
                    ON ta.Pet_ID = tb.Pet_ID_FK 
                INNER JOIN breeds AS tc 
                    ON ta.Breed_ID_FK = tc.Breed_ID 
                WHERE tb.User_RUT_FK = $RUT;";

        $query = mysqli_query($conn, $sql);
        
        return $query;
    } catch (\Throwable $error) {
        var_dump($error);
    }
}

function deletePets($id)
{
    try {
        require 'dbConnection.php';
        $sql = "DELETE FROM pets WHERE pet_id = {$id};";
        $query = mysqli_query($conn, $sql);
        return $query;

    } catch (\Throwable $thr) {
        var_dump($thr);
    }
}

function addPet($User_RUT, $Name, $Sex, $Age)
{
    try {
        require 'dbConnection.php';

        $sql = "CALL SP_Insert_Pet($User_RUT,'$Name','$Sex',$Age);";

        $query = mysqli_query($conn, $sql);
        return $query;

    } catch (\Throwable $thr) {
        var_dump($thr);
    }

}