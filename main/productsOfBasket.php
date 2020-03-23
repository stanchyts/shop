<html>
	<head>
		<title>
			Ваша корзина
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
					if ($_SESSION['currentUser']->getItemsOfUser() != "0")
					{
				?>
						<a href = "buyProductsByUser.php">
						    Оплатить
						</a>
				<?php
					}
					else
					{
				?>
						<a href = "productsOfBasket.php">
							<?php
								echo "Ваша корзина, ".$_SESSION['currentUser']->getNameOfUser();
							?>
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
					<a href = "exit.php">
						Выйти
					</a>
				</li>
			</ul>
		</div>
		<div class = "rowsOfBlocksItem">	
			<?php
				if ($_SESSION['currentUser']->getItemsOfUser() != "0")
				{
					$workBD = new bd();
					$itemsOfUserProducts = $_SESSION['currentUser']->printProductsByBasket();
					$i = 1;
					while ($i < count($itemsOfUserProducts)) 
					{ 
						
						$result  = $workBD->sqlQueryItemProduct($itemsOfUserProducts[$i]);
						$itemsOfProducts  =  $result->fetch_assoc();
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
								<a href = "<?php echo "deleteProductOfBasket.php?idOfProduct=".$itemsOfProducts['id'];?>" class = "buttonOfProduct">
									Удалить из корзины
								</a>
							</div>
						</div>
					<?php
						$i++;
					}
				}
				else
				{
					if(isset($_GET['successful']))
					{
		?>
					<div style = "margin-left:45%;">
						<p class = "newInformation">
							Вы успешно оплатили заказ!
						</p>
					</div>
		<?php
					}
					else
					{
					?>
					<div style = "margin-left:45%;">
						<p class = "errorInformation">
							Ваша корзина пустая!
						</p>
					</div>
					<?php
					}
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