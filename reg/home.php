<?php 
include "base.php";
?>
<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>��������</title>
</head>
<body>
<div id="main">
	<?php
	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))  
		{
	?>  
	<div id="header">
		<div style="margin-left:auto;">
			 <p>�� ����� ��� <b style="font: 16pt Tahoma; color:red;"><?=$_SESSION['Username']?></b>   <a href="logout.php">�����</a></p>
		</div>	 
	</div>
	<div id="content">
		<h1>Welcome!</h1>
		<p>������ ����!</p> 
	</div>
	<?
		}
	else 
		{
	?>  
	<div id="content">
		<h1>No Way!</h1>
		<p>�������� ���������� ������������������� �������������! <a href="index.php">���������������</a> ��� <a href="register.php">�����������������</a>.</p> 
	</div>
	<?
		}
	?>  
</div>
</body>
</html>