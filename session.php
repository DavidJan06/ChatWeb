<?php
    session_start();

    $allow_url = ['/Chat/login.php','/Chat/login_check.php','/Chat/registration.php','/Chat/user_insert.php','/Chat/index.php'];

    if(!isset($_SESSION['user_id']) && !in_array($_SERVER['REQUEST_URI'], $allow_url))
    {
        header("location: ./login.php");
        die();
    }

    function is_admin(){
        if(isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)){
            return true;
        }
        else{
            return false;
        }
    }

    function adminOnly(){
        if(!is_admin()){
            header("location: ./index.php");
            die();
        }
    }
?>