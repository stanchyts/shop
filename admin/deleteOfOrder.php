<?php
	include '../main/lib.php';
	session_start();
	$_SESSION["currentAdmin"]->sqlQueryDeleteOrder($_GET["idOfOrder"]);
	header("Location: http://localhost/shop/admin/orders.php?newOrder=1");
?>