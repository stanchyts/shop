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
					    echo 'Здравствуйте, '.$_SESSION['currentAdmin']->getNameOfAdmin();
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
				<li>
					<a href = "orders.php">
						Заказы
					</a>
				</li>
				<li>
					<a href = "exit.php">
						Выйти
					</a>
				</li>
			</ul>
		</div>
		<div class = "textAuth">
		    <form action = "sqlAddNewCategory.php" class="formOfAuth" method = "POST">
				<p>
					Добавить категорию:
				</p>
				<input type = "text" placeholder = "Введите имя новой категории..." name = "nameOfCategory" required />
				<br /><br />
				<input type = "text" placeholder = "Выберите фото новой категории..." name = "imgOfCategory" required />
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