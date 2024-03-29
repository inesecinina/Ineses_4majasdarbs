<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $todo_id = $_POST['update'];
    $event = $_POST['event'];
    $description = $_POST['description'];
    $doing_date = $_POST['doing_date'];

    
    $stmt = $conn->prepare("UPDATE `to_do_list`
        SET `event` = (:event),
            `description` = (:description),
            `doing_date` = (:doing_date)
        WHERE `to_do_list`.`id` = (:todoid)");

    $stmt->bindParam(':todoid', $todo_id);
    $stmt->bindParam(':event', $event);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':doing_date', $doing_date);

    $stmt->execute();
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
