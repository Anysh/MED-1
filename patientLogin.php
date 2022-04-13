<?php
require_once("config.php");
if(isset($_REQUEST['id'])) {
    $smarty->assign("appointmentId", $_REQUEST['id']);
}


$smarty->display("patientLogin.tpl");

?>

