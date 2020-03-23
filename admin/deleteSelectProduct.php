<?php
	include '../main/lib.php';
	session_start();
	if(isset($_SESSION['currentAdmin']))
		$_SESSION['currentAdmin']->sqlQueryDeleteItemProductByAdmin($_GET["idOfProduct"]);
	else
		$_SESSION['currentPartner']->sqlQueryDeleteItemProductByPartner($_GET["idOfProduct"]);
	header("Location: http://localhost/shop/admin/productsOfCategory.php?idOfCategory=".$_GET["idOfCategory"]."&deleteProduct=1");
?>