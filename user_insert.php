<?php
include_once("session.php");
include_once("connect.php");
include_once("cleaner.php");

$username = xss_cleaner($_POST['username']);
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];

if(!empty($username) && !empty($pass1) && !empty($pass2) && ($pass1 == $pass2))
{
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, online) VALUES(?,?,false);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $pass]);
}
else
{
    header("location: ./registration.php");
    die();
}

header("location: ./login.php");
?>