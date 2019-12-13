<?php
 session_start();
if (!$_SESSION['id']) {
    return; 
}


require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $event = $_POST['event'];
    $description = $_POST['description']; //FIXME when no artist exists
    $doing_date = $_POST['doing_date'];
    $user_id = $_SESSION['id'];

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO to_do_list (event, description, doing_date, user_id)
                            VALUES (:event, :description, :doing_date, :user_id)");
    $stmt->bindParam(':event', $event);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':doing_date', $doing_date);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
