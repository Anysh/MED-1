<?php
require_once('config.php');

$appointmentId = $_REQUEST['appointmentID'];
$q = $db->prepare("SELECT * FROM appointment WHERE id = ?");
$q->bind_param("i", $appointmentId);
if($q && $q->execute()) {

    $appointment = $q->get_result()->fetch_assoc();
    $appointmentDate = $appointment['date'];
    $appointmentTimestamp = strtotime($appointmentDate);

}

if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {

    $p = new Patient();
    $p->setFirstName($_REQUEST['firstName']);
    $p->setLastName($_REQUEST['lastName']);
    $p->setPhone($_REQUEST['phone']);
    $p->setPesel($_REQUEST['pesel']);
    if($p->save()) {
        $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
        $patientId = $p->getId();
        $q->bind_param("ii", $patientId, $appointmentId);
        if($q->execute()) {
            echo "Zapisano poprawnie pacjenta na wizytę";
        }

    } else {
        throw new Exception("Nie udało się dodać pacjenta do bazy");
    }

} else {

    $q = $db->prepare("SELECT * FROM patient WHERE pesel = ?");
    $q->bind_param("s", $_REQUEST['pesel']);
    $q->execute();
    $patientResult = $q->get_result();
    if($patientResult->num_rows == 1) {

        $patient = $patientResult->fetch_assoc();
        $patientId = $patient['id'];
        $q->prepare("INSERT INTO patientappointment VALUES (NULL, ?, ?)");
        $q->bind_param("ii", $patientId, $appointmentId);
        $q->execute();
        echo "Zapisano na wizytę!";
    } else {
        echo "Nie znaleziono takiego pacjenta";
    }
    
}
//
?>