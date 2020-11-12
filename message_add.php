<?php
include_once("session.php");
include_once("connect.php");
include_once("cleaner.php");

$connectionid = $_POST['connection_id'];
$message = xss_cleaner($_POST['message']);
$now = date_create()->format('Y-m-d H:i:s');

if(!empty($connectionid) && !empty($message))
{  
    $query = "INSERT INTO messages (connection_id, time, message) VALUES(?,?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$connectionid, $now, $message]);
}
else
{
    header("location: ./chat.php");
    die();
}

header("location: ./chat.php");
?>