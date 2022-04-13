<?php
require_once("config.php");

if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])){
    $q = $db->prepare("INSERT INTO patient VALUES (NULL, ?, ?, ? , ?)");
    $q->bind_param("ssss", $_REQUEST['firstName'], $_REQUEST['lastName'],
                            $_REQUEST['phone'], $_REQUEST['pesel']);
    if($q->execute()) {
        $smarty->assign("message", "Pajent dodany do systemu");
        $smarty->assign("retunUrl", "patientLogin.php");
        $smarty->display("message.tpl");
    }


}else {
    $smarty->display("newPatientForm.tpl");
}

?>


