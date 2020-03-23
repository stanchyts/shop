<?php
    include 'lib.php';
	session_start();
	$_SESSION['currentUser']->addProductByBasket($_GET['idOfProduct']);
	if(isset($_GET['idOfCategory']))
		header("Location: http://localhost/shop/main/productsOfCategory.php?idOfCategory=".$_GET['idOfCategory']);
	else
		if(isset($_GET["inquiryOfSearch"]))
			header("Location: http://localhost/shop/main/resultOfSearch.php?inquiryOfSearch=".$_GET['inquiryOfSearch']);
		else
			header("Location: http://localhost/shop/main/itemOfProduct.php?idOfProduct=".$_GET['idOfProduct']);
?>