<?php
include_once("session.php");
include_once("connect.php");
include_once("databaseFunctions.php");

$data = file_get_contents('php://input');
$data = json_decode($data);
$room_id = $data[0]->room_id;

$select_messages = "SELECT m.*, u.username 
                                    FROM messages m 
                                    INNER JOIN connection c USING(connection_id) 
                                    INNER JOIN users u USING(user_id) 
                                WHERE room_id=? ORDER BY (m.time) ASC";

$item = request($pdo, $select_messages, $room_id);
echo json_encode($item->fetchAll(), JSON_HEX_TAG);

?>