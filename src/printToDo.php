<?php
require_once 'db.php';

if (!isset($_SESSION['username'])) {
    // echo "Lūdzu, ieej savā profilā, lai redzētu savu darba virsmu!";
    return;
} 
$stmt = $conn->prepare("SELECT * FROM to_do_list
    WHERE (user_id = :user_id)");
$stmt->bindParam(':user_id', $_SESSION['id']);
$stmt->execute();

$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$allRows = $stmt->fetchAll();

echo "<div class='flexis'>";
$columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    
    // echo "<form action='updateToDoProcess.php' method='post'>";
    echo "<div class='containeris-darbi'>";

    foreach ($row as $key => $value) {
        switch ($key) {
            case 'event':
            case 'description':
            case 'doing_date':
               echo "<div>" . $row["$key"] . "</div>"; 
            default:
                // echo "<span class='value-cell'>$value </span>";
                break;
        }
    }
    
    // echo "</div>";
    //echo "</form>";
    
    echo "<div class = 'btn-flex'>";
     $rowid = $row['id'] ;
    
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button class = 'update_btn' name='delete' value='" . $row['id'] . "'>Dzēst</button>";
    echo "</form>";
    echo "<a href = 'updateTodo.php?update=$rowid'><button class = 'update_btn' name='update' value='" . $rowid . "'>Labot</button></a>"; 
    echo "</div>";
    echo "</div>";
}
echo "</div>";
echo "<hr>";