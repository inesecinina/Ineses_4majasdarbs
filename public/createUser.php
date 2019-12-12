<?php
require_once '../src/templates/head.php';
?>
    <div class="pieteikties modal-content">
        
        <form action="createUserProcess.php" method="post">
            <h2>Izveidot lietotāju</h2>
            <label for='username'><b>Izvēlies lietotājvārdu</b></label>
            <input type="text" name="username" placeholder="Lietotājvārds" required>
            <label for='password'><b>Izveido paroli</b></label>
            <input type="password" name="password" required placeholder="Parole (min 6 simboli)">
            <label for='password2'><b>Atkārto paroli</b></label>
            <input type="password" name="password2" required placeholder="Atkārto paroli">
            <button type="submit">Pieteikties</button>
</form>
            <a href = "/"><button formnovalidate="formnovalidate">Atcelt</button></a>
    </div>
<?php
require_once '../src/templates/footer.php';