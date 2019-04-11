<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');
if(isset($_SESSION['username'])) { // Если есть данные в 'blablabla', то...
echo '<frameset rows="10%, 90%"  frameborder="0" framespacing="0">
   		<frame scrolling="no" src="menu.php">
        <frame src="content.php" name="content">
    </frameset>'; // Выполняем что-либо
}
else { // Если данных в сессии нет, то...
echo '<a href="login.php" class="btn btn-lg btn-primary btn-block" type="submit">login</a>';
}
?>