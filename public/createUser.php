<?php
require_once '../src/templates/head.php';
?>
    <div class="pieteikties">
        <h1>Izveidot lietotāju</h1>
        <form action="createUserProcess.php" method="post">
            <input type="text" name="username" placeholder="Izvēlies lietotājvārdu" required>
            <input type="password" name="password" required placeholder="Ievadi paroli (min 6 simboli)">
            <input type="password" name="password2" required placeholder="Atkārto paroli">
            <button type="submit">Pieteikties</button>
        </form>
    </div>
<?php
require_once '../src/templates/footer.php';