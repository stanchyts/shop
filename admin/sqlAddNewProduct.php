<?php
    include '../main/lib.php';
	session_start();
	if(isset($_SESSION['currentAdmin']))
		$_SESSION['currentAdmin']->sqlQueryAddNewProductByAdmin($_POST["nameOfProduct"],$_POST["desOfProduct"],$_POST["imgOfProduct"],$_POST["idOfCategory"],$_POST["priceOfProduct"]);
	else
		$_SESSION['currentPartner']->sqlAddNewProductByPartner($_POST["nameOfProduct"],$_POST["desOfProduct"],$_POST["imgOfProduct"],$_POST["idOfCategory"],$_POST["priceOfProduct"]);	
	header("Location: http://localhost/shop/admin/productsOfCategory.php?idOfCategory=".$_POST["idOfCategory"]."&newProduct=1");
?>