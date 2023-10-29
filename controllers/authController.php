<?php
    require '../models/userAccounts.php';
    //Iniciar sesión para credenciales
    session_start();

    try {
        //Validar que se recibio una petición POST en el servidor
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Obtener las credenciales enviadas por el metodo POST
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Validar las credenciales en la base de datos
            $credentials = getCredentials($email, $password);
            
            //Acreditar que el usuario existe en la base de datos para brindarle acceso
            if(!$credentials){
                //Reenviar de nuevo al login
                header("Location: ../index.php");
                exit;
                //Si existe la sesión
            } else {
                //Volver accesibles los datos de la consulta
                $credentials = $credentials->fetch_assoc();
                
                echo $credentials['Rol'];
                //Validar el rol de la cuenta
                if($credentials['Rol'] == 'User'){
                    //Es persona particular
                    //Traer la información del perfil
                    require '../models/users.php';
                    
                    $profile = getUserByAccountID($credentials['Account_ID']);
                    $profile = $profile->fetch_assoc();

                    //Guardar la sesión para realizar peticiones a la bd con el usuario loggeado
                    $_SESSION['Rol'] = $credentials['Rol'];
                    $_SESSION['AccountID'] = $credentials['Account_ID'];
                    $_SESSION['RUT'] = $profile['RUT'];
                    $_SESSION['Name'] = $profile['Name'];
                    $_SESSION['Surname'] = $profile['Surname'];
                    
                    header("Location: ../views/pets.php");
                    exit;
                } else {
                    //Es veterinario, como por ahora no tiene acceso solo se le devuelve al login
                    header("Location: ../index.php");
                    exit;
                }
            }
        }

    } catch(\Throwable $error) {
        var_dump($error);
    }

?>