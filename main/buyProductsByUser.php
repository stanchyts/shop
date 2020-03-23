<?php
    include 'lib.php';
	session_start();
	$_SESSION['currentUser']->buyProductsByBasket();
	header("Location: http://localhost/shop/main/productsOfBasket.php?successful=1");
?>