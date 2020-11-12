<?php
include_once("session.php");
include_once("connect.php");
include_once("cleaner.php");

$username = xss_cleaner($_POST['username']);
$pass = $_POST['password'];

if(!empty($username) && !empty($pass))
{
    $query = "SELECT * FROM users WHERE username=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);

    if($stmt->rowCount() == 1)
    {
        $user = $stmt->fetch();
        if(password_verify($pass, $user['password']))
        {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['username'];

            $query = "UPDATE users SET online = true WHERE user_id=?;";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);

            header("location: ./index.php");
            die();
        }
    }
}

header("location: ./login.php");
die();
?>