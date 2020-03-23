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
							if((isset($_SESSION["currentPartner"]) and $mainItem["idOfPartner"] == $_SESSION["currentPartner"]->getIdOfPartner()) or isset($_SESSION["currentAdmin"]))
							{
						?>
								<a href = "<?php echo 'changeInfoOfProduct.php?idOfProduct='.$mainItem['id']?>" class = "buttonOfProduct">
									Изменить
								</a>
								<a href = "<?php echo 'deleteSelectProduct.php?idOfProduct='.$mainItem['id'].'&idOfCategory='.$mainItem['idOfCategory']?>" class = "buttonOfProduct">
									Удалить
								</a>
						<?php		
							}
							else
							{
						?>
								<a href = "" class = "buttonOfProduct" style="pointer-events: none; background-color:grey;">
									Изменить
								</a>
								<a href = "" class = "buttonOfProduct" style="pointer-events: none; background-color:grey;">
									Удалить
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