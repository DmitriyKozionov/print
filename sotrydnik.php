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


if ($_GET['action']=='deleteSotrs') //Проверяем есть ли в массиве GET строка с ключом deleteSotrs
{   
  
  $sotr_id = trim($_GET['sotr_id']); //// В переменную $sotr_id пишем значение из массива Get 
  
   $sql = "DELETE FROM sotrydnik WHERE id = '$sotr_id'"; //Формируем текст запроса
   mysql_query($sql);  //Выполняем запрос


   $sql = "DELETE FROM printer WHERE id = '$sotr_id'"; //Формируем текст запроса
   mysql_query($sql); 

   $result = mysql_query("SELECT id FROM printer where idsotr = '$sotr_id' LIMIT 1"); //Получаем ID связанного принтера
   $row = mysql_fetch_assoc($result); //Получаем ID связанного принтера
   $id_print = $row['id']; //Получаем ID связанного принтера

   $sql = "DELETE FROM print_link_kart WHERE id_print = '$id_print'"; //Формируем текст запроса, для удаления связки принтера и картриджа
   mysql_query($sql); 




 
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
      <div class="zagolovok"><h2>Сотрудник</h2></div>


      <hr/>
<div class="container">
  <form method="post">
  <input type = "text" name = "fio" placeholder="ФИО" />
  Отдел
  <?php
$sql = "SELECT * FROM otdel";
$result_select = mysql_query($sql);
echo "<select name = 'id_otd'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id,''$object->nazv,' >$object->nazv  </option>";
}
echo "</select>";
?>
<input type = "text" name = "doljn" placeholder="Должность" />
  <input type = "submit" value="Добавить сотрудника"/>
</form>

<hr/>
<div class="">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
    <td>ФИО</td>
     <td>Отдел</td>
     <td>Должность</td>
     <td style="border-style:hidden">&nbsp</td>
   </tr>
   <?php

$result = mysql_query("SELECT sotrydnik.id, sotrydnik.fio, sotrydnik.doljn, otdel.nazv as nazv FROM sotrydnik
LEFT JOIN otdel
ON sotrydnik.id_otd = otdel.id ");

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo "<td>".$row['id']."</td>";

    echo "<td>".$row['fio']."</td>";
    echo "<td>".$row['nazv']."</td>";
    echo '<td>'.$row['doljn'].'</td>';

    //echo'<td> <a href="sotrydnik.php?action=deleteSotrs&sotr_id='.$row['id']'" class="btn btn-danger"> Удалить </a>'. '</td>';
    echo '<td style="border-style:hidden">';
    echo '<a href="';
    echo 'sotrydnik.php?action=deleteSotrs&sotr_id=';
    echo $row['id'].'"';
    echo 'class="btn btn-outline-danger btn-sm">'.'Удалить </a> </td>';
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>