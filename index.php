<?php 

$db = new mysqli("localhost", "root", "", "med");
$q = $db->prepare("SELECT * FROM staff");

if($q && $q->execute()){

    $result = $q->get_result();
    while (($staff = $result->fetch_assoc())) {
        
        $staff_id = $staff['ID'];
        $Firstname = $staff['Firstname'];
        $Lastname = $staff['Lastname'];
        echo "LEKARZ $Firstname $Lastname<br>";
        $q = $db->prepare("SELECT * FROM Wizyta WHERE staff_id = ?");
        $q->bind_param("i", $staff_id);

        if($q && $q->execute()){
            $wizyty  = $q->get_result();
            while($wizyta = $wizyty->fetch_assoc()) {
                $wizytaID = $wizyta['ID'];
                $wizytaDATE = $wizyta['date'];
                $wizytaTIMESTAMP = strtotime($wizytaDATE);
                echo "<button>";
                echo date("j.m.H:i", $wizytaTIMESTAMP);
                echo "</button>";
            }
            echo "<br>";
        }else {
            die("Błąd pobierania terminów spotkań");
        }

    }
}else {
    die("Błąd pobierania listy lekarzy");
}




?>