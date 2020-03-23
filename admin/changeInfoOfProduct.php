<html>
	<head>
		<title>
			Управление системой
		</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../img/f.ico" />
		<link rel = "stylesheet" href = "../css/styles.css" />
	</head>
	<body>
		<div class = "rowsOfBlocksTop">
			<div class = "blockTop">
				<a href = "index.php">
					<img src = "../img/log.png" />
				</a>
			</div>
			<div class = "blockTop">
				<p class = "newInformation" style = "margin-left:40%;">
					<?php 
					    include '../main/lib.php';
						session_start(); 
						if(isset($_SESSION['currentAdmin']))
						    echo 'Здравствуйте, '.$_SESSION['currentAdmin']->getNameOfAdmin();
						else 
						    echo 'Здравствуйте, '.$_SESSION['currentPartner']->getNameOfPartner();
					?>
				</p>
			</div>
			<div class = "lastBlockTop">
				<a href = "exit.php">
					Выйти
				</a>
			</div>
		</div>
		<div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					<a href = "index.php">
						Категории
					</a>
				</li>
				<?php
					if(isset($_SESSION['currentAdmin']))
					{
				?>
					<li>
						<a href = "orders.php">
							Заказы
						</a>
					</li>
				<?php
					}
				?>
				<li>
					<a href = "exit.php">
						Выйти
					</a>
				</li>
			</ul>
		</div>
		<div class = "textAuth">
			<?php
				
				$workBD = new bd();
				$result  =  $workBD->sqlQueryItemProduct($_GET["idOfProduct"]);
				$mainItem  =  $result->fetch_assoc();	
			?>
			<form action = "sqlChangeInfoOfProduct.php" class="formOfAuth" method = "POST">
			    <input type="hidden" name = "idOfProduct" value="<?php echo $_GET["idOfProduct"];?>" />
			    <input type="hidden" name = "idOfCategory" value="<?php echo $mainItem["idOfCategory"];?>" />
			    <p>
				    Изменить товар:
			    </p>
			    <input type = "text" id = "nameOfProduct" value = "<?php echo $mainItem['nameOfProduct'];?>" name = "nameOfProduct" required />
				<br /><br />
				<input type = "text" id = "desOfProduct" value = "<?php echo $mainItem['desOfProduct'];?>" name = "desOfProduct" required />
				<br /><br />
				<input type = "text" id = "priceOfProduct" value = "<?php echo $mainItem['priceOfProduct'];?>" name = "priceOfProduct" required />
				<br /><br />
				<input type = "text" id = "imgOfProduct" value = "<?php echo $mainItem['imgOfProduct'];?>" name = "imgOfProduct" required />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Изменить
				</button>
			</form>
		</div>
		<div class = "rowsOfBlocksDown" style = "clear:both;">
			<div class = "blockDown">
				<p class = "textBlocksDown">
					©Prints 2020
				</p>
			</div>
			<div class = "blockDown">
				<p class = "textBlocksDown">
					
				</p>
			</div>
			<div class = "lastBlockDown">
				<p class = "textBlocksDown">
					Ежедневно: 10:00 - 18:00<br />+380952012981
				</p>
			</div>
		</div>
	</body>
</html>