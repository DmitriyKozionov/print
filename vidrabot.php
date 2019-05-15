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
if ($_GET['action']=='deleteviadrabot') //Проверяем есть ли в массиве GET строка с ключом deleteSotrs
{  
  $viadrabot_id = trim($_GET['viadrabot_id']);//// В переменную $sotr_id пишем значение из массива Get 

  $sql = "DELETE FROM vidrab WHERE id = '$viadrabot_id'"; //Формируем текст запроса
   mysql_query($sql);  //Выполняем запрос

}

?>
<html>

    <head>
    viadrabot_id
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Вид работ</h2></div>


      <hr/>
<div class="container">
  <form method="post">
  <input type = "text" name = "name" placeholder="Наименование" />

  <input type = "submit" value="Добавить"/>
</form>

<hr/>
<div class="">
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
    
    echo '<td style="border-style:hidden">';
    echo '<a href="';
    echo 'vidrabot.php?action=deleteviadrabot&viadrabot_id=';
    echo $row['id'].'"';
    echo 'class="btn btn-outline-danger btn-sm">'.'Удалить </a> </td>';
    echo "</tr>";

}

?>

</table>
</div>
  </body>
</html>