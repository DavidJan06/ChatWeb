<?php
    include_once("session.php");
    include_once("connect.php");

    $query = "UPDATE users SET online = false WHERE user_id=?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);

    session_destroy();

    header("location: ./index.php");
?>