<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['idrabot']))
{   
  $idprint = trim($_POST['idprint']);
  $idrabot = trim($_POST['idrabot']);
  
  $data = trim($_POST['data']);
	

        


  $remprint = mysql_real_escape_string($remprint);



   $sql = "INSERT INTO remprint (idprint, idrabot) VALUES ('$idprint','$idrabot')";
  mysql_query($sql);

header('Location: remprint.php');
exit();
}

if ($_GET['action']=='deleteRempr') //Проверяем есть ли в массиве GET строка с ключом deleteSotrs
{  
  $Rempr_id = trim($_GET['Rempr_id']);//// В переменную $sotr_id пишем значение из массива Get 

  $sql = "DELETE FROM remprint WHERE id = '$Rempr_id'"; //Формируем текст запроса
   mysql_query($sql);  //Выполняем запрос

}
?>
<html>

    <head>
    
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    	<link rel="stylesheet" type="text/css" href="style.css">
        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Работа с принтером</h2></div>


      <hr/>
<div class="container">
  <form method="post">
 
  Принтер
  <?php
$sql = "SELECT * FROM printer";
$result_select = mysql_query($sql);
echo "<select name = 'idprint'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->ID,''$object->model,' >  $object->model  </option>";
}
echo "</select>";
?>
Вид работ
  <?php
$sql = "SELECT * FROM vidrab";
$result_select = mysql_query($sql);
echo "<select name = 'idrabot'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id,''$object->name,' >  $object->name  </option>";
}
echo "</select>";
?>

  <input type = "submit" value="Добавить"/>
</form>

<hr/>
<div class="">
<table class="tab" border="1" >
  <tr>
    <td>ID</td>
    <td>Принтер</td>
  
    <td>Работа</td>
    <td>Дата</td>
    <td class="td"></td>
   </tr>
   <?php

$result = mysql_query("SELECT remprint.id, remprint.idprint, remprint.idrabot, vidrab.name, remprint.data FROM remprint
LEFT JOIN vidrab
ON vidrab.id = remprint.idrabot");

while ($row = mysql_fetch_assoc($result))


{ 

    echo '<tr>';
  
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['idprint'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['data'].'</td>';
     echo '<td class="td">';
    echo '<a href="';
    echo 'remprint.php?action=deleteRempr&Rempr_id=';
    echo $row['id'].'"';
    echo 'class="btn btn-outline-danger btn-sm">'.'Удалить </a> </td>';
    echo "</tr>";
   
    
    echo '</tr>';   
 

}

?>

</table>
</div>
  </body>
</html>