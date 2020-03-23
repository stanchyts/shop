<html>
	<head>
		<title>
			Товар
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
                $workBD = new bd();
				$result = $workBD->sqlQueryItemProduct($_GET["idOfProduct"]);
				$mainItem  =  $result->fetch_assoc();
			?>
				<div class = "itemOfProduct" style = "margin-left:35%;">
					<img src = "<?php echo $mainItem['imgOfProduct'];?>" />
					<div class = "mainOfProduct" >
						<h3>
							<?php echo $mainItem['nameOfProduct'];?>
						</h3>
						<p>
							<?php echo $mainItem['desOfProduct'];?>
						</p>
						<span class = "priceOfProduct">
							<?php echo $mainItem['priceOfProduct'];?>
						</span>
						<?php
							if(isset($_SESSION["currentUser"]))
							{
						?>
								<a href = "<?php echo 'addProductToBasket.php?idOfProduct='.$_GET['idOfProduct']?>" class = "buttonOfProduct">
									В корзину
								</a>
						<?php
							}
						?>
					</div>
				</div>
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