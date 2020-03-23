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
				<a href = "adminСategory.php">
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
			<form action = "sqlAddNewProduct.php" class="formOfAuth" method = "POST">
				<input type="hidden" name = "idOfCategory" value="<?php echo $_GET["idOfCategory"];?>" />
				<p>
				    Добавить товар:
				</p>
				<input type = "text" id = "nameOfProduct" placeholder = "Введите имя продукта..." name = "nameOfProduct" required />
				<br /><br />
				<input type = "text" id = "desOfProduct" placeholder = "Введите описание продукта..." name = "desOfProduct" required />
				<br /><br />
				<input type = "text" id = "priceOfProduct" placeholder = "Введите цену продукта..." name = "priceOfProduct" required />
				<br /><br />
				<input type = "text" id = "imgOfProduct" placeholder = "Введите картинку продукта..." name = "imgOfProduct" required />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Добавить
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