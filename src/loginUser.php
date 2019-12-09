<?php
//we need to start sesssion to check if user already exists
session_start();
if (isset($_SESSION['username'])) {
    echo "Sveiks! Laipni lūgts darbu vācelītē" . $_SESSION['username'];
} else {
    echo "<div class='register-p'>Neesi reģistrējies? Izdari to šeit! <a href='createUser.php'>Izveidot lietotāju</a> or";
    echo "<form class='login-f' action='loginProcess.php' method='post'>";
    echo "<input name='username'placeholder='Ievadi lietotājvārdu' required>";
    echo "<input name='password' type='password' placeholder='Ievadi paroli' required>";
    echo "<button>Ienākt</button>";
    echo "</form>";
    echo "</div>";
}
echo "<hr>";
