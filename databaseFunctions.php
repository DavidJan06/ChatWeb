<?php

function request($pdo, $query, ...$args){
    $stmt = $pdo->prepare($query);
    $stmt -> execute($args);
    return $stmt;
}

?>