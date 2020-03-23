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
					    echo 'Здравствуйте, '.$_SESSION['currentAdmin']->getNameOfAdmin();
					?>
				</p>
				<?php
					if(isset($_GET['newOrder']))
					{
				?>
						<p class = "newInformation" style = "margin-left:30%;">
							Вы успешно обработали заказ!
						</p>
				<?php
					}
				?>
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
		<div class = "rowsOfBlocksItem">
			<?php
	            $result = $_SESSION['currentAdmin']->sqlQueryPrintOrders();
				$workBD = new bd();
				$flag = true;
				while ($itemsOfProducts  =  $result->fetch_assoc())
				{
					$flag = false;
			?>
					<div class = "itemOfProduct">
						<div class = "mainOfProduct">
							<h3>
								<?php 
								    $resultOfUser = $_SESSION['currentAdmin']->sqlQueryPrintUsers($itemsOfProducts['idOfUser']);
								    $userOfOrder  =  $resultOfUser->fetch_assoc();
								    echo $userOfOrder['nameOfUser'];
							    ?>
							</h3>
							<span class = "priceOfProduct">
							    <?php 
							        $itemsOfUserProducts = explode("&",$itemsOfProducts['listOfProducts']);
							        $i = 1;
							        while ($i < count($itemsOfUserProducts)) 
							        { 
						                $resultOfProducts = $workBD->sqlQueryItemProduct($itemsOfUserProducts[$i]);
								        $productsOfOrder  =  $resultOfProducts->fetch_assoc();
								        echo $productsOfOrder['nameOfProduct']."; ";
								        $i++;
							        }
							    ?>
							</span>
							<a href = "<?php echo "deleteOfOrder.php?idOfOrder=".$itemsOfProducts['id']; ?>" class = "buttonOfProduct">
								Обработан
							</a>
						</div>
					</div>
			<?php
				}
			?>
				</div>
			</div>
			<?php
			    if($flag)
				{
			?>
			        <div style = "margin-left:45%; margin-top:3%;">
				        <p class = "errorInformation">
				            Все заказы обработаны!
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