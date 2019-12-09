<?php
//we need to start sesssion to check if user already exists
session_start();
if (isset($_SESSION['username'])) {
    echo "Sveiks! Laipni lūgts darbu vācelītē" . $_SESSION['username'];
} else {
    echo "<div class='register-p'>";
    echo "<form class='logins' action='loginProcess.php' method='post'>";
    echo "<input class= 'input_field' name='username'placeholder='Ievadi lietotājvārdu' required>";
    echo "<input class= 'input_field' name='password' type='password' placeholder='Ievadi paroli' required>";
    echo "<button>Ienākt</button>";
    echo "Neesi reģistrējies? Izdari to šeit! <a href='createUser.php'>Izveidot lietotāju</a> <br>";
    echo "</form>";
    echo "</div>";
}
echo "<hr>";
