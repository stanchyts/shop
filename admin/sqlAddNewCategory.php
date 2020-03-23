<?php
    include '../main/lib.php';
	session_start();
    $_SESSION['currentAdmin']->sqlQueryAddNewCategory($_POST["nameOfCategory"],$_POST["imgOfCategory"]);
	header("Location: http://localhost/shop/admin/index.php?newCategory=1");
?>