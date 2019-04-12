<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>

<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');
if (isset($_POST['username']))
{
   
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
{
  $users = mysql_real_escape_string($users);


  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  
  mysql_query($sql);
}

}


?>



    <div class="container">
    	<form class="form-signin" method="POST">
    		<h2>Регистрация</h2>
    		<input type="text" name="username" class="form-control" placeholder="username" required>
    		<input type="email" name="email" class="form-control" placeholder="email" required>
    		<input type="password" name="password" class="form-control" placeholder="password" >
    		<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    		<a href="login.php" class="btn btn-lg btn-primary btn-block" type="submit">Вход</a>
    		
    	</form>
    </div>
</body>
</html>