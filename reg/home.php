<?php 
include "base.php";
?>
<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>Страница</title>
</head>
<body>
<div id="main">
	<?php
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))  
		{
	?>  
	<div id="header">
		<div style="margin-left:auto;">
			 <p>Вы вошли как <b style="font: 16pt Tahoma; color:red;"><?=$_SESSION['Username']?></b>   <a href="logout.php">ВЫХОД</a></p>
		</div>	 
	</div>
	<div id="content">
		<h1>Welcome!</h1>
		<p>Привет всем!</p> 
	</div>
	<?
		}
	else 
		{
	?>  
	<div id="content">
		<h1>No Way!</h1>
		<p>Страница недоступна незарегистрированым пользователям! <a href="index.php">Авторизируйтесь</a> или <a href="register.php">зарегистрируйтесь</a>.</p> 
	</div>
	<?
		}
	?>  
</div>
</body>
</html>