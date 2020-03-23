<?php
	include '../main/lib.php';
	session_start();
	if(isset($_SESSION['currentAdmin']))
		$_SESSION['currentAdmin']->sqlQueryChangeItemProduct($_POST["nameOfProduct"], $_POST["desOfProduct"], $_POST["priceOfProduct"], $_POST["imgOfProduct"], $_POST["idOfProduct"]);
	else
		$_SESSION['currentPartner']->sqlQueryChangeItemProduct($_POST["nameOfProduct"], $_POST["desOfProduct"], $_POST["priceOfProduct"], $_POST["imgOfProduct"], $_POST["idOfProduct"]);	
	header("Location: http://localhost/shop/admin/productsOfCategory.php?idOfCategory=".$_POST["idOfCategory"]."&changeProduct=1");
?>