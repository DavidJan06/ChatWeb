<?php
include_once("session.php");
include_once("connect.php");
include_once("cleaner.php");

$roomname = xss_cleaner($_POST['roomname']);

if(!empty($roomname))
{
    $query = "INSERT INTO rooms (name, user_id) VALUES(?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$roomname, $_SESSION['user_id']]);
}
else
{
    header("location: ./rooms.php");
    die();
}

header("location: ./rooms.php");
?>