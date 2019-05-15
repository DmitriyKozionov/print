<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['idrabot']))
{   
  $idkart = trim($_POST['idkart']);
  $idrabot = trim($_POST['idrabot']);
  $data = trim($_POST['data']);

  $remkart = mysql_real_escape_string($remkart);



   $sql = "INSERT INTO remkartr (idkart, idrabot) VALUES ('$idkart','$idrabot')";
  mysql_query($sql);

header('Location: remkartr.php');
exit();
}
if ($_GET['action']=='deleteRemkart') //Проверяем есть ли в массиве GET строка с ключом deleteSotrs
{  
  $Remkart_id = trim($_GET['Remkart_id']);//// В переменную $sotr_id пишем значение из массива Get 

  $sql = "DELETE FROM remkartr WHERE id = '$Remkart_id'"; //Формируем текст запроса
   mysql_query($sql);  //Выполняем запрос

}
?>
<html>

    <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" type="text/css" href="style.css">
        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Работа с картриджем</h2></div>


      <hr/>

  <form method="post">
 <div class="container">
  Картридж
  <?php
$sql = "SELECT kartridj.id as Kartiges, kartridj.model, sotrydnik.id, sotrydnik.fio FROM kartridj 
LEFT JOIN sotrydnik
ON sotrydnik.id = kartridj.idsotr
GROUP BY kartridj.id";
$result_select = mysql_query($sql);
echo "<select name = 'idkart'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->Kartiges''$object->idkart >  $object->fio, $object->Kartiges  </option>";
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
    <td>Картридж</td>
    <td>Сотруник</td>
    <td>Работа</td>
     <td>Дата</td>
     <TD style="border-style:hidden"> </TD>
    
   </tr>
   <?php

$result = mysql_query("SELECT remkartr.id, remkartr.idkart, remkartr.idrabot, vidrab.name, remkartr.data, sotrydnik.fio
FROM remkartr 
LEFT JOIN vidrab
ON vidrab.id = remkartr.idrabot

LEFT JOIN print_link_kart
ON remkartr.idkart = print_link_kart.id_kart

LEFT JOIN printer
ON printer.id = print_link_kart.id_print

LEFT JOIN sotrydnik
ON sotrydnik.id = printer.idsotr");


while ($row = mysql_fetch_assoc($result))


{ 

    echo '<tr>';
  
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['idkart'].'</td>';
    echo '<td>'.$row['fio'].'</td>';
    echo '<td>'.$row['name'].'</td>';
    echo '<td>'.$row['data'].'</td>';
     echo '<td style="border-style:hidden">';
    echo '<a href="';
    echo 'remkartr.php?action=deleteRemkart&Remkart_id=';
    echo $row['id'].'"';
    echo 'class="btn btn-outline-danger btn-sm">'.'Удалить </a> </td>';

   
    
    echo '</tr>';   
 

}

?>

</table>
</div>
  </body>
</html>