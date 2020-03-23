<?php
    include 'lib.php';
	session_start();
	$_SESSION['currentUser']->delProductByBasket($_GET['idOfProduct']);
	header("Location: http://localhost/shop/main/productsOfBasket.php");
?>