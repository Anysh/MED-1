<?php

$db = new mysqli("local", "root", "", "med");
$wizytaID = $_REQUEST['id'];
$q = $db->prepare("SELECT * FROM wizyta WHERE id = >");
$q->bind_param("i", $wizytaID);

if($q && $q->execute ()) {
    $wizyta = $q->get_result()->fetch_assoc();
    $wizytaDATE = $wizyta['date'];
}

?>

<form action="wizyta.php">
Imię: <input type="text" name="Firstname">
Nazwisko: <input type="text" name="Lastname">
Telefon: <input type="text" name="phone">
<input type="hidden" value="<?php echo $wizytaID ?>" name="id">
<input type="submit" value="Zapisz wizytę">

</form>