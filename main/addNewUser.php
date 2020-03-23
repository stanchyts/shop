<?php
	include 'lib.php';
    $workBD = new bd();
	if (isset($_POST['statusNewPartner']))
		$workBD->sqlQueryAddPartner($_POST['statusNewPartner'], $_POST["nameOfNewUser"],$_POST["pswOfNewUser"]);
	else
		$workBD->sqlQueryAddUser($_POST["nameOfNewUser"],$_POST["pswOfNewUser"]);
	header("Location: http://localhost/shop/main/enter.php?newRegistration=1");
?>