<?php
//we need to start sesssion to check if user already exists
session_start();
if (isset($_SESSION['username'])) {
    echo "<div class = 'logout'>";
    echo "<div class='sveiciens'>Sveiks! Laipni lūgts darbu vācelītē, "  . $_SESSION['username']."</div>";
    echo "<form action='logoutProcess.php' method='post'>";
    echo "<button style='width: 100px'>Iziet</button>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<form class='modal-content' action='loginProcess.php' method='post'>";
    echo "<h2>Darbu vācelīte</h2>";
    echo "<div>";
    echo "<label for='username'><b>Lietotājvārds</b></label>";
    echo "<input class= 'input_field' name='username'placeholder='Ievadi lietotājvārdu' required>";
    echo "</div>";
    echo "<div>";
    echo "<label for='password'><b>Parole</b></label>"; 
    echo "<input class= 'input_field' name='password' type='password' placeholder='Ievadi paroli' required>";
    echo "</div>";
    echo "<button>Ienākt</button>";
    echo "Neesi reģistrējies? Izdari to šeit! <a href='createUser.php'>Izveidot lietotāju</a> <br>";
    echo "</form>";
}

