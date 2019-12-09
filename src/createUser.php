<?php
require_once '../src/templates/head.php';
?>
    <div class="pieteikties">
        <h1>Registration Form</h1>
        <form action="createUser.php" method="post">
            <input type="text" name="username" placeholder="Izvēlies lietotājvārdu" required>
            <input type="email" name="email" placeholder="Tava e-pasta adrese" required>
            <input type="password" name="password" required placeholder="Ievadi paroli">
            <input type="password" name="password2" required placeholder="Atkārto paroli">
            <button type="submit">Pieteikties</button>
        </form>
    </div>
<?php
require_once '../src/templates/foot.php';