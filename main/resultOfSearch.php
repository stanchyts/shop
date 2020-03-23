<html>
	<head>
		<title>
			Результат поиска
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
		<div class = "rowsOfBlocksItem">
			<?php
				$flag = true;
                $workBD = new bd();
				$result = $workBD->sqlQuerySearchProducts($_GET["inquiryOfSearch"]);
				while ($itemsOfProducts  =  $result->fetch_assoc())
				{
					$flag = false;
			?>		
					<div class = "itemOfProduct">
						<img src = "<?php echo $itemsOfProducts['imgOfProduct'];?>" />
						<div class = "mainOfProduct">
							<h3>
								<?php echo $itemsOfProducts['nameOfProduct'];?>
							</h3>
							<span class = "priceOfProduct">
								<?php echo $itemsOfProducts['priceOfProduct'];?>
							</span>
							<a href = "<?php echo 'itemOfProduct.php?idOfProduct='.$itemsOfProducts['id']?>" class = "buttonOfProduct">
								Посмотреть
							</a>
							<?php
								if(isset($_SESSION['currentUser']))
								{
							?>
									<a href = "<?php echo 'addProductToBasket.php?idOfProduct='.$itemsOfProducts['id'].'&inquiryOfSearch='.$_GET["inquiryOfSearch"]?>" class = "buttonOfProduct">
										В корзину
									</a>
							<?php
								}
							?>
						</div>
					</div>
			<?php
				}
				if ($flag)
				{
			?>
					<div style = "margin-left:40%;">
						<p class = "errorInformation">
							По вашему запросу ничего не найдено!
						</p>
					</div>
			<?php
				}
		?>
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