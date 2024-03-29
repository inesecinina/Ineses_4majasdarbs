<?php
function checkLogin($conn, $username, $password)
{
    $stmt = $conn->prepare("SELECT id, hash FROM users
        WHERE (username = :username)");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $allRows = $stmt->fetchAll();
    if (count($allRows) > 0) {
        $hash = $allRows[0]['hash'];
        if (password_verify($password, $hash)) {
            
            $_SESSION['username'] = $username;
            $_SESSION['id'] = (int) $allRows[0]['id'];
        } else {
            header('Location: ./?message=badlogin');
            return;
    }

    header('Location: ./?message=goodlogin');
}
}