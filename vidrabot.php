<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['name']))
{   
	
	$name = trim($_POST['name']);
	
        


  $vidrab = mysql_real_escape_string($vidrab);



   $sql = "INSERT INTO vidrab (id,name) VALUES ('$id' ,'$name')";
  mysql_query($sql);

header('Location: vidrabot.php');
exit();
}
?>
<html>

    <head>
    
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Вид работ</h2></div>


      <hr/>

  <form method="post">
  <input type = "text" name = "name" placeholder="Наименование" />

  <input type = "submit" value="Добавить"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
    <td>Наименование</td>
    
   </tr>
   <?php
$result = mysql_query('SELECT * FROM vidrab');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    
   
   
    
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>