<?php
    include '../main/lib.php';
    session_start();
    $_SESSION['currentAdmin']->sqlQueryChangeInfoByCategory($_POST["nameOfCategory"],$_POST["imgOfCategory"],$_POST['idOfCategory']);
	header("Location: http://localhost/shop/admin/index.php?changeCategory=1");
?>