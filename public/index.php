<?php
require_once '../src/templates/head.php';
echo "<header>";
require_once '../src/loginUser.php';
// if(message == 'badlogin'){
//     echo "<div class='alert alert-warning'>";
//     echo "<strong>Uzmanību!</strong> Jūsu ievadītās paroles nesakrīt!";
//     echo "</div>";
// }
echo "</header>";

if (!isset($_SESSION['username'])) {
    return;
} else {
echo "<div class = 'containeris'>";
echo "<h1> Darbu vācelīte ir aplikācija, kas palīdzēs atcerēties to, ko var gadīties aizmirst :) </h1>";
echo "<a href = 'addToDo.php'><button> + Pievienot darbu</button></a>";
echo "</div>";
}
require_once '../src/printToDo.php';



require_once '../src/templates/footer.php';
