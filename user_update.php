<?php
include_once("session.php");
include_once("connect.php");
include_once("cleaner.php");

$username = xss_cleaner($_POST['username']);
$opass = $_POST['oldpassword'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

if(!empty($username) && !empty($opass))
{
    $query = "SELECT * FROM users WHERE user_id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    if(password_verify($opass, $user['password'])){
        if(!empty($pass1) && !empty($pass2) && ($pass1 == $pass2)){
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $query = "UPDATE users SET username=?, password=? WHERE user_id=?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $pass, $_SESSION['user_id']]);
        }
        else{
            $query = "UPDATE users SET username=? WHERE user_id=?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $_SESSION['user_id']]);
        }

        $_SESSION['user_name'] = $username;
    }
}
else
{
    header("location: ./user_edit.php");
    die();
}

header("location: ./user_edit.php");
?>