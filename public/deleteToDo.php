<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $todo_id = $_POST['delete'];

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM `to_do_list` WHERE `to_do_list`.`id` = (:todoid)");
    $stmt->bindParam(':todoid', $todo_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
