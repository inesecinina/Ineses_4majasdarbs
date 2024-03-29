<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    if (strlen($_POST['password']) < 6) {
        echo "Password too short";
        die("Too short!");
    }
    if ($_POST['password'] != $_POST['password2']) {
        // echo "Paroles nesakrīt";
        echo "<div class='alert alert-warning'>";
        echo "<strong>Uzmanību!</strong> Jūsu ievadītās paroles nesakrīt!";
        echo "</div>";

    }
    // you could check if password matches certain format
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //TODO add real users

    // prepare and bind
   try { $stmt = $conn->prepare("INSERT INTO users (username, hash)
                            VALUES (:username, :hash)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hash', $hash);

    $stmt->execute();
   } catch (PDOException $error) {
       echo "User alredy exists";
       die(" ");
   }
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
