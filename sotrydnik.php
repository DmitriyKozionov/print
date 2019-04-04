<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['fio']))
{   
	$fio = trim($_POST['fio']);
	$id_otd = trim($_POST['id_otd']);
	$doljn = trim($_POST['doljn']);
        


  $sotrydnik = mysql_real_escape_string($sotrydnik);



   $sql = "INSERT INTO sotrydnik (fio,id_otd,doljn) VALUES ('$fio' ,'$id_otd','$doljn')";
  mysql_query($sql);

header('Location: sotrydnik.php');
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
      <div class="zagolovok"><h2>Сотрудник</h2></div>


      <hr/>

  <form method="post">
  <input type = "text" name = "fio" placeholder="ФИО" />
  Отдел
  <?php
$sql = "SELECT * FROM otdel";
$result_select = mysql_query($sql);
echo "<select name = 'id_otd'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id,''$object->nazv,' > $object->id $object->nazv,  </option>";
}
echo "</select>";
?>
<input type = "text" name = "doljn" placeholder="Должность" />
  <input type = "submit" value="Добавить сотрудника"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
    <td>ФИО</td>
     <td>Отдел</td>
     <td>Должность</td>
   </tr>
   <?php

$result = mysql_query('SELECT * FROM sotrydnik');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo "<td>".$row['id']."</td>";

    echo "<td>".$row['fio']."</td>";
    echo "<td>".$row['id_otd'].$row['nazv']."</td>";
    echo '<td>'.$row['doljn'].'</td>';
   
    
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>