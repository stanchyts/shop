<html>
	<head>
		<title>
			FAQ
		</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../img/f.ico" />
		<link rel = "stylesheet" href = "../css/styles.css" />
		<script type="text/javascript"> 
			function desOpenClose(numberDes,numberCancel,text) 
			{  
				if (text!="") 
				{
					document.getElementById(numberDes).innerHTML=text;
					document.getElementById(numberCancel).innerHTML="<br/>(Свернуть)<br/><br/>";
				}
				else 
				{
					document.getElementById(numberCancel).innerHTML=""; 
					document.getElementById(numberDes).innerHTML="(Ответ)";
				} 
		    } 
		</script> 
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
		<div class = "textFAQ">
			<p>
				1. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r1" onclick='desOpenClose("r1","s1","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s1" onclick='desOpenClose("r1","s1","");'>
				</span>
			</p>
			<p>
				2. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r2" onclick='desOpenClose("r2","s2","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s2" onclick='desOpenClose("r2","s2","");'>
				</span>
			</p>
			<p>
				3. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r3" onclick='desOpenClose("r3","s3","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s3" onclick='desOpenClose("r3","s3","");'>
				</span>
			</p>
			<p>
				4. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r4" onclick='desOpenClose("r4","s4","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s4" onclick='desOpenClose("r4","s4","");'>
				</span>
			</p>
			<p>
				5. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r5" onclick='desOpenClose("r5","s5","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s5" onclick='desOpenClose("r5","s5","");'>
				</span>
			</p>
			<p>
				6. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r6" onclick='desOpenClose("r6","s6","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s6" onclick='desOpenClose("r6","s6","");'>
				</span>
			</p>
			<p>
				7. Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст ? 
				<span id="r7" onclick='desOpenClose("r7","s7","<br/><br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст<br/>ТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекстТекст");'>
					(Ответ)
				</span> 
				<br />
				<span id="s7" onclick='desOpenClose("r7","s7","");'>
				</span>
			</p>
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