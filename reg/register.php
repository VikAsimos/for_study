<?php include "base.php"; ?> 
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="windows-1251">
    <title>Регистрация</title>
</head>
<body>
    <div id="main">
		<div id="content">
		<?php
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']))  
		{  
		$username = mysql_real_escape_string($_POST['username']);  
		$password = md5(mysql_real_escape_string($_POST['password']));  	
		$password2 = md5(mysql_real_escape_string($_POST['password2']));
		 
//needs php 5.5!!!!!!!
		//$password2 = mysql_real_escape_string($_POST['password2']);
		//$password = password_hash(mysql_real_escape_string($_POST['password2']), PASSWORD_DEFAULT);
//!!!		
		
		//$checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'"); 
		
		$checkusername = $pdo->prepare('SELECT * FROM users WHERE Username = :username');
		$checkusername->bindParam(':username', $username, PDO::PARAM_STR);
		$checkusername->execute();		
		
		//if(mysql_num_rows($checkusername) == 1)  
		
		if($checkusername->rowCount() == 1) 
		{  
			echo "<h1>Ошибка</h1>";  
			echo "<p>Извините, такой логин уже используется.</p>";  
		} 
		elseif ($password != $password2)
		{
			echo "<h1>Ошибка</h1>";  
			echo "<p>Пароли не совпадают.</p>"; 
		}
		else  
		{  
			//$registerquery = mysql_query("INSERT INTO users (Username, Password) 
			//VALUES('".$username."', '".$password."')");
			
			$registerquery = $pdo->prepare('INSERT INTO users (Username, Password) VALUES(:username, :password)');
			$registerquery->bindParam(':username', $username, PDO::PARAM_STR);
			$registerquery->bindParam(':password', $password, PDO::PARAM_STR);
			$registerquery->execute();
			
			
			if($registerquery)  
			{  
				echo "<h1>Регистрация завершена!</h1>";  
				echo "<p>Учётная запись создана. <a href=\"index.php\">Авторизуйтесь</a>.</p>";  
			}  
			else  
			{  
				echo "<h1>Ошибка</h1>";  
				echo "<p>Мы не смогли вас зарегистрировать. Попробуйте снова.</p>";      
			}         
		 }  
	}  
	else  
	{  
		?>  	 
	    <h1>Регистрация</h1>  	 
	    <p>Пожалуйста заполните несколько полей ниже.</p>  
		<form method="post" action="register.php" name="registerform" id="registerform" style="text-align:right;padding-right:600px;">  
		<fieldset>  
			<label for="username">Логин:</label><input type="text" name="username" id="username"><br>  
			<label for="password">Пароль:</label><input type="password" name="password" id="password"><br>
			<label for="password">Повторите пароль:</label><input type="password" name="password2" id="password2"><br>
			<input type="submit" name="register" id="register" value="Зарегистрироваться">  
		</fieldset>  
		</form>   
	   <?php  
	}  ?>
		</div>
    </div>
</body>
</html>