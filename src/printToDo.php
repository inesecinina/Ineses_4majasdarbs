<?php
require_once 'db.php';

if (!isset($_SESSION['username'])) {
    echo "Please Login to see your songs";
    return;
} else {
    echo "Hello there " . $_SESSION['username'] . "!<br>";
}
$stmt = $conn->prepare("SELECT * FROM to_do_list
    WHERE (user_id = :user_id)");
$stmt->bindParam(':user_id', $_SESSION['id']);
$stmt->execute();

$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$allRows = $stmt->fetchAll();

echo "<hr>";
echo "<div class='todoes'>";
$columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    
    echo "<form action='updateToDo.php' method='post'>";
    echo "<div class='update-todo'>";

    foreach ($row as $key => $value) {

        //TODO we need to process title, artist and length seperately as special cases
        switch ($key) {
            case 'Event':
            case 'Description':
            case 'Doing_date':
                echo "<input class='input-value-cell value-$key' name='$key' value='$value'></input>";
                break;
            default:
                echo "<span class='value-cell'>$value </span>";
                break;
        }
    }
    echo "<button name='update' value='" . $row['id'] . "'>Update</button>";
    echo "</div>";
    echo "</form>";
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "<hr>";