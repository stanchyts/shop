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
						if(isset($_GET['newCategory']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно добавили категорию!
							</p>
					<?php
						}
						if(isset($_GET['changeCategory']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно изменили категорию!
							</p>
					<?php
						}
						if(isset($_GET['deleteCategory']))
						{
					?>
							<p class = "newInformation" style = "margin-left:30%;">
								Вы успешно удалили категорию!
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
				$result = $workBD->sqlQueryCategories();
				while ($itemsOfCategory  =  $result->fetch_assoc())
				{
			?>
				    <div class = "itemOfProduct">
					    <img src = "<?php echo $itemsOfCategory['imgOfCategory'];?>" />
					    <div class = "mainOfProduct">
						    <a href = "<?php echo 'productsOfCategory.php?idOfCategory='.$itemsOfCategory['id'];?>">
							    <h3>
								    <?php echo $itemsOfCategory['nameOfCategory'];?>
							    </h3>
						    </a>
						    <?php
							if(isset($_SESSION['currentAdmin']))
							{
						    ?>
								<a href = "<?php echo 'changeInfoOfCategory.php?idOfCategory='.$itemsOfCategory['id'];?>" class = "buttonOfProduct">
									Изменить
								</a>
								<a href = "<?php echo 'deleteSelectCategory.php?idOfCategory='.$itemsOfCategory['id'];?>" class = "buttonOfProduct">
									Удалить
								</a>
						    <?php
							}
						    ?>
					    </div>
				    </div>
			<?php
				}
				if(isset($_SESSION['currentAdmin']))
				{
			?>
					<div class = "itemOfProduct" >
						<img src = "../img/add.png" />	
						<div class = "mainOfProduct">	
							<h3>
								Вы можете добавить новую категорию!
							</h3>
							<a href = "addNewCategory.php" class = "buttonOfProduct">
								Добавить
							</a>
						</div>
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