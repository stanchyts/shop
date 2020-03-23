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
					<?php
						if(isset($_GET['newProduct']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно добавили продукт!
							</p>
					<?php
						}
						if(isset($_GET['changeProduct']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно изменили продукт!
							</p>
					<?php
						}
						if(isset($_GET['deleteProduct']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно удалили продукт!
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
				$result = $workBD->sqlQueryProducts($_GET['idOfCategory']);
				while ($itemsOfProducts  =  $result->fetch_assoc())
				{
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
							<a href = "<?php echo "itemOfProduct.php?idOfProduct=".$itemsOfProducts['id']; ?>" class = "buttonOfProduct">
								Просмотреть
							</a>
							<?php
								if((isset($_SESSION["currentPartner"]) and $itemsOfProducts["idOfPartner"] == $_SESSION["currentPartner"]->getIdOfPartner()) or isset($_SESSION["currentAdmin"]))
								{
							?>
									<a href = "<?php echo 'changeInfoOfProduct.php?idOfProduct='.$itemsOfProducts['id']?>" class = "buttonOfProduct">
										Изменить
									</a>
									<a href = "<?php echo 'deleteSelectProduct.php?idOfProduct='.$itemsOfProducts['id'].'&idOfCategory='.$itemsOfProducts['idOfCategory']?>" class = "buttonOfProduct">
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
			<?php
				}
			?>
			<div class = "itemOfProduct" >
				<img src = "../img/add.png" />	
				<div class = "mainOfProduct">	
					<h3>
						<?php
							if(isset($_SESSION['currentAdmin']))
							    echo 'Здравствуйте, '.$_SESSION['currentAdmin']->getNameOfAdmin();
							else 
								echo 'Здравствуйте, '.$_SESSION['currentPartner']->getNameOfPartner();
						?>
					</h3>
					<span class = "priceOfProduct">
						<?php
							$flag = true;
							if (isset($_SESSION["currentAdmin"]))
								echo 'Вы можете добавить новый продукт!';
							else
							{
								if ($_SESSION["currentPartner"]->getCountItemsOfPartner() == 0)
								{
									$flag = false;
									echo 'Вы добавили максимальное кол-во продуктов! <br /> Удалите, чтоб иметь возможность добавить!';
								}
								else
									echo 'Вы можете добавить '.$_SESSION["currentPartner"]->getCountItemsOfPartner().' новых продукта!';
							}
						?>
					</span>
					<?php
						if($flag)
						{
					?>		
							<a href = "<?php echo 'addNewProduct.php?idOfCategory='.$_GET['idOfCategory']?>" class = "buttonOfProduct">
								Добавить
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