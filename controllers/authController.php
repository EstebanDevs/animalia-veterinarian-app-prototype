<?php
    require '../models/sessions.php';
    //Iniciar sesión para credenciales
    session_start();

    try {
        //Validar que se recibio una petición POST en el servidor
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Obtener las credenciales enviadas por el metodo POST
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Buscar la sesión en la bd
            $session = getSession($email, $password);
            
            //Acreditar que el usuario existe en la base de datos para brindarle acceso
            if(!$session){
                //Reenviar de nuevo al login
                header('Location: ../index.php');
                exit;
                //Si existe la sesión
            } else {
                //Volver accesibles los datos de la consulta
                $session = $session->fetch_assoc();
                
                //Validar si el usuario es persona particular o veterinario
                if($session['User_RUT_FK'] != null){
                    //Es persona particular
                    //Guardar la sesión para realizar peticiones a la bd con el usuario loggeado
                    $_SESSION['Rol'] = 'User';
                    $_SESSION['RUT'] = $session['User_RUT_FK'];
                    $_SESSION['Email'] = $session['Email'];
                    $_SESSION['Password'] = $session['Password'];
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