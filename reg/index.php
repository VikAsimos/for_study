<?php include "base.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="windows-1251">
    <title>�����������</title>
</head>
<body>
    <div id="main">
		<div id="content">
		<?php
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))  
			{
		?>  
		 <meta http-equiv='refresh' content='0;home.php'>
		<?php 
			}    
		elseif(!empty($_POST['username']) && !empty($_POST['password']))  
		{  
		$username = mysql_real_escape_string($_POST['username']); 
		
		$password = md5(mysql_real_escape_string($_POST['password'])); 

//needs php 5.5 !!!!!!
		//$password = password_hash(mysql_real_escape_string($_POST['password']), PASSWORD_DEFAULT);
		
//
		//$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
		$checklogin = $pdo->prepare('SELECT * FROM users WHERE Username = :username AND Password = :password ');
		$checklogin->bindParam(':username', $username, PDO::PARAM_STR);
		$checklogin->bindParam(':password', $password, PDO::PARAM_STR);
		$checklogin->execute();
	 
		//if(mysql_num_rows($checklogin) == 1)
		if($checklogin->rowCount() == 1) 		
		{  
			$row = mysql_fetch_array($checklogin);  	 
			$_SESSION['Username'] = $username;  
			$_SESSION['LoggedIn'] = 1;  
			echo "<meta http-equiv='refresh' content='0;index.php'>";  
		}  
		else  
		{  
			echo "<h1>������</h1>";  
			echo "<p>������������ ����� ��� ������!. <a href=\"index.php\">���������� ��� ���</a>.</p>";  
		} 
		}  
	else  
	{  
		?>   
	   <h1>�����������</h1>  
	 
	   <p>������� ��� <a href="register.php">�����������������</a>.</p>  
	 
		<form method="post" action="index.php" name="loginform" id="loginform" style="text-align:right;padding-right:600px;">  
		<fieldset>  
			<label for="username">�����:</label><input type="text" name="username" id="username"><br>  
			<label for="password">������:</label><input type="password" name="password" id="password"><br>  
			<input type="submit" name="login" id="login" value="�����">  
		</fieldset>  
		</form>   
	   <?php  
	}  ?>
		</div>
    </div>
</body>
</html>