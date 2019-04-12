<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');
if (isset($_POST['model']))
{
   
    $inv = trim($_POST['inv']);
    $id = trim($_POST['idsotr']);
    $model = trim($_POST['model']);
    $idsotr= trim($_POST['idsotr']);
    
{
  $printer = mysql_real_escape_string($printer);


  $sql = "INSERT INTO printer (model, inv, idsotr) VALUES ('$model', '$inv', '$idsotr')";
  
  mysql_query($sql);
}
header('Location: printer.php');
exit();
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
      <div class="zagolovok"><h2>Принтер</h2></div>


      <hr/>

  <form method="post">
  <input type = "text" name ="model" placeholder="Модель" />
  <input type ="text" name ="inv" placeholder="Инвентариза́ционный" />
  Сотрудник
  <?php
$sql = "SELECT * FROM sotrydnik";
$result_select = mysql_query($sql);
echo "<select name = 'idsotr'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id','$object->fio' > $object->fio </option>";
}
echo "</select>";
?>

<input type = "submit" value="Добавить принтер"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
    <td>Модель</td>
     <td>Инвентариза́ционный номер</td>
    <td>ID_картриджа</td>
    <td>Фио сотрудника</td>
  </tr>

<?php
$result = mysql_query('SELECT printer.ID, printer.inv, .printer.model, printer.idsotr, GROUP_CONCAT(kartridj.id) as Kartiges, sotrydnik.fio  FROM printer
LEFT JOIN print_link_kart
ON printer.ID = print_link_kart.id_print

LEFT JOIN kartridj
ON print_link_kart.id_kart = kartridj.id

LEFT JOIN sotrydnik
ON printer.idsotr = sotrydnik.id
GROUP BY printer.ID');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo '<td>'.$row['ID'].'</td>';
    echo '<td>'.$row['model'].'</td>';
    echo '<td>'.$row['inv'].'</td>';
    echo '<td>'.$row['Kartiges'].'</td>';
    echo '<td>'.$row['fio'].'</td>';
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>
