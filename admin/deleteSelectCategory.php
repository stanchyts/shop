<?php
    include '../main/lib.php';
    session_start();
    $_SESSION['currentAdmin']->sqlQueryDeleteSelectCategory($_GET["idOfCategory"]);
	header("Location: http://localhost/shop/admin/index.php?deleteCategory=1");
?>