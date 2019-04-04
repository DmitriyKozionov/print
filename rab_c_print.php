<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['model']))
{   
	$id_pr = trim($_POST['ID']);
	$id_rab = trim($_POST['id']);
	$data = trim($_POST['data']);
        


  $remprint = mysql_real_escape_string($remprint);



   $sql = "INSERT INTO rab_c_kart (id_pr,id_kar) VALUES ('$id_pr' ,'$id_kar')";
  mysql_query($sql);

header('Location: rab_c_kart.php');
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
      <div class="zagolovok"><h2>Работа с картриджем</h2></div>


      <hr/>

  <form method="post">
 
  Принтер
  <?php
$sql = "SELECT * FROM printer";
$result_select = mysql_query($sql);
echo "<select name = 'id_pr'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id,''$object->model,' > $object->ID $object->model  </option>";
}
echo "</select>";
?>
Картридж
  <?php
$sql = "SELECT * FROM kartridj";
$result_select = mysql_query($sql);
echo "<select name = 'id_kart'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id,''$object->model,' > $object->id $object->model  </option>";
}
echo "</select>";
?>

  <input type = "submit" value="Добавить"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>Принтер</td>
    <td>Картридж</td>
     <td>Дата</td>
    
   </tr>
   <?php

$result = mysql_query('SELECT * FROM rab_c_kart');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
  

    echo "<td>".$row['id_pr']."</td>";
    echo "<td>".$row['id_kart'].$row['nazv']."</td>";
    echo '<td>'.$row['data'].'</td>';
   
    
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>