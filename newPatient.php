<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])){
}else {
    echo '
    <form action="newPatient.php" method="post">
    <label for="firstName">Imię:</label>
    <input type="text" name="firstName" id ="firstName">
    <label for="lastName">Nazwisko:</label>
    <input type="text" name="lastName" id="lastName">
    <label for="pesel">Numer Pesel</label>
    <input type="text" name="pesel" id="pesel">
    <input type="submit" value="Zapisz">
    </form>
    ';
}

?>
<input type="text" name="" id="">

