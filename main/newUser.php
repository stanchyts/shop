<html>
	<head>
		<title>
			Регистрация пользователя
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
				<form action = "resultOfSearch.php" class = "formOfSearch" method = "POST">
			        <input type = "search"  placeholder = "Поиск по товарам..." name = "inquiryOfSearch" required />
			        <button type = "submit" class = "buttonOfSearch">
						<img src = "../img/search.png" />
					</button>
		        </form>
			</div>
			<div class = "lastBlockTop">
				<a href = "enter.php">
					Войти
				</a>
			</div>
		</div>
		<div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					<a href = "index.php">
						Главная
					</a>
				</li>
				<li>
					<a href = "patrners.php">
						Партнерам
					</a>
				</li>
				<li>
					<a href = "faq.php">
						FAQ
					</a>
				</li>
				<li>
					<a href = "contacts.php">
						Контакты
					</a>
				</li>
				<li>
					<a href = "enter.php">
						Войти
					</a>
				</li>
			</ul>
		</div>
		<div class = "textAuth">
			<form action = "addNewUser.php" class="formOfAuth" method = "POST">
				<?php
					if(isset($_GET['statusNewPartner']))
					{
				?>
						<input type = "hidden" value = "<?php echo $_GET['statusNewPartner'];?>" name = "statusNewPartner" />
				<?php
					}
				?>
				<input type = "text" placeholder = "Придумайте имя пользователя..." name = "nameOfNewUser" required />
				<br /><br />
				<input type = "password" placeholder = "Придумайте пароль пользователя..." name = "pswOfNewUser" required />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Зарегистрироваться
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