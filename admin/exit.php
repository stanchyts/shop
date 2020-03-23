<?php
	session_start();
	$_SESSION = array();
	header("Location: http://localhost/shop/main/index.php");
?>