<?php
if (!$_SESSION['username']) {
    return;
}

?>
<div class="to do-form">
<form action="addToDoProcess.php" method="post">
    <input name="event" placeholder="Ierakstiet darbiņu" required>
    <input name="description" placeholder="vieta aprakstam">
    <input type="date" name="date" id="datepicker">
    <button type="submit">Pievienot darbu</button>
</form>
</div>