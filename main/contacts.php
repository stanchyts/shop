<html>
	<head>
		<title>
			Контакты
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
				<form action = "resultOfSearch.php" class = "formOfSearch" method = "GET">
			        <input type = "search"  placeholder = "Поиск по товарам..." name = "inquiryOfSearch" required />
			        <button type = "submit" class = "buttonOfSearch">
						<img src = "../img/search.png" />
					</button>
		        </form>
			</div>
			<div class = "lastBlockTop">
				<?php 
					include 'lib.php';
					session_start();
					if(isset($_SESSION['currentUser']))
					{
				?>
						<a href = "productsOfBasket.php">
							<?php
								echo "Ваша корзина, ".$_SESSION['currentUser']->getNameOfUser();
							?>
						</a>
				<?php
					}
					else
					{
				?>			
						<a href = "enter.php">
							Войти
						</a>
				<?php
					}	
				?>
			</div>
		</div>
		<div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					<a href = "index.php">
						Главная
					</a>
				</li>
				<?php 
					if(!isset($_SESSION['currentUser']))
					{
				?>
						<li>
							<a href = "patrners.php">
								Партнерам
							</a>
						</li>
				<?php
					}
				?>
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
				<?php 
					if(isset($_SESSION['currentUser']))
					{
				?>
						<li>
							<a href = "exit.php">
								Выйти
							</a>
						</li>
				<?php
					}
					else
					{
				?>
						<li>
							<a href = "enter.php">
								Войти
							</a>
						</li>
				<?php
					}
				?>
			</ul>
		</div>
		<div class = "textContacts">
			<p>
				<h2>
					BRAND LOGO
				</h2>
			</p>
			<p>
				<h5>
					Ежедневно: 10:00 - 18:00 <br/> 
					+380952012981
				</h5>
			</p>
			<iframe src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2647.485096434319!2d35.03286451518476!3d48.42802883886628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe34d28c55a03%3A0xc53986dc74ff9904!2z0L_RgNC-0YHQvy4g0JPQsNCz0LDRgNC40L3QsCwgODQsINCU0L3QuNC_0YDQviwg0JTQvdC10L_RgNC-0L_QtdGC0YDQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDQ5MDAw!5e0!3m2!1sru!2sua!4v1580658242487!5m2!1sru!2sua" width = "600" height = "450" frameborder = "0" style = "border:0;" allowfullscreen = ""></iframe>
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