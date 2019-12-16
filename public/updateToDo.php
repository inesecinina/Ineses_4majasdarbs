<?php
session_start();
require_once '../src/templates/head.php';
require_once '../src/db.php';


if (!isset($_SESSION['username'])) {
    // echo "Lūdzu, ieej savā profilā, lai redzētu savu darba virsmu!";
    return;
} 
$stmt = $conn->prepare("SELECT * FROM to_do_list 
    WHERE (user_id = :user_id AND id = :todo_id)");
$stmt->bindParam(':user_id', $_SESSION['id']);
$stmt->bindParam(':todo_id', $_GET['update']);
$stmt->execute();

$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$allRows = $stmt->fetchAll();

echo "<div class='containeris'>";
// $columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    
    echo "<form action='updateToDoProcess.php' method='post'>";
    echo "<div>";
    echo "<h2>Labot darbu</h2>";

    foreach ($row as $key => $value) {

        switch ($key) {
            case 'event':
                echo "<label for='event'><b>Kas jādara?</b></label>";
                echo "<input class='input-value-cell value-$key' name='$key' value='$value'></input>";
                break; 
            case 'description':
                echo "<label for='description'><b>Kā jādara?</b></label>";
               echo "<textarea class='apraksts' value-$key' name='$key' value='$value'>$value</textarea>";
                break; 
            case 'doing_date':
                echo "<label for='doing_date'><b>Kad jādara?</b></label>";
                echo "<input class='input-value-cell value-$key' type='date' name='$key' value='$value'></input>";
            break; 
            default:
                // echo "<span class='value-cell'>$value </span>";
                break;
        }
    }
    echo "<div class = 'btn-flex2'>";
    echo "<button class = 'update_btn' name='update' value='" . $row['id'] . "'>Labot</button>";
    echo "</form>";
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button class = 'update_btn' name='delete' value='" . $row['id'] . "'>Dzēst</button>";
    echo "</form>";
    echo "<a href = '/'><button class = 'update_btn'>Atcelt</button></a>";
    echo "</div>";
    echo "</div>";
    
}
echo "</div>";
echo "<hr>";

require_once '../src/templates/footer.php';