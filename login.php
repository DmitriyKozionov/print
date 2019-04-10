<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');
if (isset($_POST['username']))
{   $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
$query="SELECT * FROM users where username='$username' and password='$password' ";
$result = mysql_query($query) ;
$count = mysql_num_rows($result);
if ($count == 1) {
    $_SESSION['username'] = $username;
}else{
    $fmsg = "Ошибка";
}
}
if (isset($_SESSION['username']))  {
    $username = $_SESSION['username'];
   echo "Hello" . $username . " ";
    echo "ВЫ вошли";
  echo '<script>window.location.href = "frem.php";</script>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">    
</head>
<body>
    <div class="container">
        <form class="form-signin" method="POST">
            <h2>Вход</h2>
            <input type="text" name="username" class="form-control" placeholder="username">
            <input type="password" name="password" class="form-control" placeholder="password">
            <button  class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
            <a href="index.php" class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</a>
         
        </form>
    </div>
    <div>

</div>
</body>
</html>