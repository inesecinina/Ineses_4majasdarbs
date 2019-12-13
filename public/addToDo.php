<?php
require_once '../src/templates/head.php';

?>

<div class="containeris">
<h2>Pievienot darbu</h2>
<form action="addToDoProcess.php" method="post">
    <label for='event'><b>Kas jādara?</b></label>
    <input name="event" placeholder="Ierakstiet darbiņu" required>
    <label for='description'><b>Kā jādara?</b></label>
    <textarea class="apraksts" name="description" placeholder="vieta aprakstam"></textarea>
    <label for='doing_date'><b>Kad jādara?</b></label>
    <input type="date" name="doing_date" id="datepicker">
    <button type="submit">Pievienot darbu</button>
</form>
<a href = "/"><button>Atcelt</button></a>
</div>
<?php
require_once '../src/templates/footer.php';