<?php
class admin {
	private $idOfAdmin;
	private $nameOfAdmin;
	
	public function __construct($idOfAdmin, $nameOfAdmin) {
		$this->idOfAdmin = $idByUser;
		$this->nameOfAdmin = $nameOfAdmin;
	}
	
	public function getNameOfAdmin(){
		return $this->nameOfAdmin;
	}
	public function getDateBase(){
		return $this->datebase;
	}
	
	public function sqlQueryAddNewCategory($nameOfCategory, $imgOfCategory){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("INSERT INTO categories (nameOfCategory, imgOfCategory) VALUES ('".$nameOfCategory."', '".$imgOfCategory."')");
	}
	public function sqlQueryAddNewProductByAdmin($nameOfProduct,$desOfProduct,$imgOfProduct,$idOfCategory,$priceOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("INSERT INTO products (nameOfProduct, desOfProduct, imgOfProduct, idOfCategory, priceOfProduct, idOfPartner) VALUES ('".$nameOfProduct."', '".$desOfProduct."','".$imgOfProduct."','".$idOfCategory."','".$priceOfProduct."', NULL)");
	}
	
	public function sqlQueryChangeItemProduct($nameOfProduct, $desOfProduct, $priceOfProduct, $imgOfProduct, $idOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("UPDATE products SET nameOfProduct='".$nameOfProduct."',  desOfProduct='".$desOfProduct."',  priceOfProduct='".$priceOfProduct."',  imgOfProduct='".$imgOfProduct."' WHERE id='".$idOfProduct."'");
	}
	public function sqlQueryChangeInfoByCategory($nameOfCategory, $imgOfCategory, $idOfCategory){
        $datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("UPDATE categories SET nameOfCategory='".$nameOfCategory."', imgOfCategory='".$imgOfCategory."' WHERE id='".$idOfCategory."'");
	}
	
	public function sqlQueryDeleteItemProductByAdmin($idOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("DELETE FROM products WHERE id = '".$idOfProduct."'");
	}
	public function sqlQueryDeleteSelectCategory($idOfCategory){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("DELETE FROM categories WHERE id = '".$idOfCategory."'");
		$datebase->query("DELETE FROM products WHERE idOfCategory = '".$idOfCategory."'");
	}
	public function sqlQueryDeleteOrder($idOfOrder){	
	    $datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("DELETE FROM orders WHERE id=".$idOfOrder);
	}
	
	public function sqlQueryPrintOrders(){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `orders`");
		return $res;
	}
	public function sqlQueryPrintUsers($idOfUser){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
        $res  = $datebase->query("SELECT * FROM `users` WHERE id=".$idOfUser);
		return $res;
	}
}



class user {
	private $idOfUser;
	private $nameOfUser;
	private $itemsOfUser;
	
	public function __construct($idByUser, $nameByUser) {
		$this->idOfUser = $idByUser;
		$this->nameOfUser = $nameByUser;
		$this->itemsOfUser = "0";
	}
	
	public function getNameOfUser(){
		return $this->nameOfUser;
	}
	public function getItemsOfUser(){
		return $this->itemsOfUser;
	}
	
	public function addProductByBasket($idOfProduct) {
		$this->itemsOfUser = $this->itemsOfUser.'&'.$idOfProduct;
	}
	public function delProductByBasket($idOfProduct) {
		$itemsOfUserProducts = explode("&",$this->itemsOfUser);
		$i = 1;
		$flag = true;
		$this->itemsOfUser = "0";
		while ($i < count($itemsOfUserProducts)) 
	    {
			if ($itemsOfUserProducts[$i] == $idOfProduct)
			{
				if($flag)
				    $flag = false;
			    else
			        $this->itemsOfUser = $this->itemsOfUser.'&'.$itemsOfUserProducts[$i];
			}
			else {
				$this->itemsOfUser = $this->itemsOfUser.'&'.$itemsOfUserProducts[$i];
			}
			$i++;
		}
	}
	public function printProductsByBasket() {
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$itemsOfUserProducts = explode("&",$this->itemsOfUser);
		return $itemsOfUserProducts;
	}
	public function buyProductsByBasket() {
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
	    $datebase->query("INSERT INTO orders (listOfProducts, idOfUser) VALUES ('".$this->itemsOfUser."', '".$this->idOfUser."')");
	    $this->itemsOfUser = "0";
	}
	
}

class partner {
	private $idOfPartner;
	private $nameOfPartner;
	private $countItemsOfPartner;
	
	public function __construct($idOfPartner, $nameOfPartner, $countItemsOfPartner) {
		$this->idOfPartner = $idOfPartner;
		$this->nameOfPartner = $nameOfPartner;
		$this->countItemsOfPartner = $countItemsOfPartner;
	}
	
	public function getNameOfPartner(){
		return $this->nameOfPartner;
	}
	public function getIdOfPartner(){
		return $this->idOfPartner;
	}
	public function getCountItemsOfPartner(){
		return $this->countItemsOfPartner;
	}
	
	function sqlQueryDeleteItemProductByPartner($idOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
        $datebase->query("DELETE FROM products WHERE id = '".$idOfProduct."'");
		$datebase->query("UPDATE users SET countItemsOfUser=countItemsOfUser+1 WHERE id='".$this->getIdOfPartner()."'");
		$this->countItemsOfPartner = $this->countItemsOfPartner + 1;
	}
	function sqlAddNewProductByPartner($nameOfProduct,$desOfProduct,$imgOfProduct,$idOfCategory,$priceOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$datebase->query("INSERT INTO products (nameOfProduct, desOfProduct, imgOfProduct, idOfCategory, priceOfProduct, idOfPartner) VALUES ('".$nameOfProduct."', '".$desOfProduct."','".$imgOfProduct."','".$idOfCategory."','".$priceOfProduct."', '".$this->getIdOfPartner()."')");
	    $datebase->query("UPDATE users SET countItemsOfUser=countItemsOfUser-1 WHERE id='".$this->getIdOfPartner()."'");
		$this->countItemsOfPartner = $this->countItemsOfPartner - 1;
	}
	function sqlQueryChangeItemProduct($nameOfProduct, $desOfProduct, $priceOfProduct, $imgOfProduct, $idOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
        $datebase->query("UPDATE products SET nameOfProduct='".$nameOfProduct."',  desOfProduct='".$desOfProduct."',  priceOfProduct='".$priceOfProduct."',  imgOfProduct='".$imgOfProduct."' WHERE id='".$idOfProduct."'");
	}
}

class bd {
	public function sqlQueryCategories(){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `categories`");
		return $res;
	}
	public function sqlInfoByCategory($idOfCategory){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `categories` WHERE id=".$idOfCategory);
		return $res;
	}
	public	function sqlQueryProducts($idOfCategory){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `products` WHERE idOfCategory  =  ".$idOfCategory);
		return $res;
	}
	public function sqlQueryItemProduct($idOfProduct){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `products` WHERE id = ".$idOfProduct);
		return $res;
	}
	public function sqlQuerySearchProducts($inquiryOfSearch){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$res  =  $datebase->query("SELECT * FROM `products` WHERE nameOfProduct LIKE '%".$inquiryOfSearch."%'");
		return $res;
	}
	public function sqlQueryAddPartner($statusNewPartner,$nameOfNewUser,$pswOfNewUser){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$pswOfNewUser = md5($pswOfNewUser);
		switch ($statusNewPartner)
		{
			case 1: $statusOfPartner = 'standart'; $countOfItems = 3; break;
			case 2: $statusOfPartner = 'medium'; $countOfItems = 5; break;
			case 3: $statusOfPartner = 'vip'; $countOfItems = 10; break;
		}
		$datebase->query("INSERT INTO users (nameOfUser, pswOfUser, classOfUser, countItemsOfUser) VALUES ('".$nameOfNewUser."', '".$pswOfNewUser."', '".$statusOfPartner."','".$countOfItems."')");
	}
	public function sqlQueryAddUser($nameOfNewUser,$pswOfNewUser){
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$pswOfNewUser = md5($pswOfNewUser);
		$datebase->query("INSERT INTO users (nameOfUser, pswOfUser, classOfUser) VALUES ('".$nameOfNewUser."', '".$pswOfNewUser."', 'user')");
	}
	public function validateEnter($nameOfUser,$pswOfUser){
		$flag = true;
		$datebase = mysqli_connect('localhost', 'root', '', 'prints');
		$result = $datebase->query("SELECT * FROM `users`");
	    while ($userInfo = $result->fetch_assoc())
	    {
		    if($userInfo['nameOfUser'] == $nameOfUser)
		    {
			    if($userInfo['pswOfUser'] == md5($pswOfUser))
			    {
					$flag = false;
				    switch ($userInfo['classOfUser'])
				    {
					    case 'admin': session_start(); $curAdmin = new admin($userInfo['id'],$userInfo['nameOfUser']); $_SESSION['currentAdmin'] = $curAdmin; header("Location: http://localhost/shop/admin/index.php"); break;
					    case 'user': session_start(); $curUser = new user($userInfo['id'],$userInfo['nameOfUser']); $_SESSION['currentUser'] = $curUser; header("Location: http://localhost/shop/main/index.php"); break;
					    default: session_start(); $curPartner = new partner($userInfo['id'], $userInfo['nameOfUser'], $userInfo['countItemsOfUser']); $_SESSION['currentPartner'] = $curPartner; header("Location: http://localhost/shop/admin/index.php"); 	
				    }	
			    }
		    }
	    }
		if($flag)
		    header("Location: http://localhost/shop/main/enter.php?errorValidate=1");
	}
}
?>