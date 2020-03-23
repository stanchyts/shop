<?php
    include 'lib.php';
    $workBD = new bd();
	$workBD->validateEnter($_POST["nameOfUser"],$_POST["pswOfUser"]);
?>