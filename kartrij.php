<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['model']))
{
    $model = trim($_POST['model']);
    $id_printera = trim($_POST['id_printera']);
   


    if ($model !='')
{
  $kartridj = mysql_real_escape_string($kartridj);
  $sql = "INSERT INTO kartridj ( model, id_printera) VALUES ('$model', '$id_printera')";

  mysql_query($sql);


}
header('Location: kartrij.php');
exit();
}
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
  
    </head>
    <body >
         <hr/>
   <form method="post">
  <input type = "text" name ="model" placeholder="Модель" />

  <input type = "submit" value="Добавить картридж"/>
  </form>
         <hr/>

<table class="tab" border="1" >
  <tr>
    <td>id</td>
    <td>Модель</td>
    <td>Id Принтера</td>
  
  </tr>

<?php
$result = mysql_query('SELECT * FROM kartridj');

while ($row = mysql_fetch_assoc($result))

{ 

    echo "<tr>";

    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['model'].'</td>';
    echo '<td>'.$row['id_printera'].'</td>';
   
    echo "</tr>";   
 

}

?>

</table> 




<div class="f1">
  <p>Принтер</p>

<?php
$sql = "SELECT * FROM printer";

$result_select = mysql_query($sql);

echo "<select name = ''>";

while($object = mysql_fetch_object($result_select)){

echo "<option value = '$object->ID' > $object->ID </option>";

}

echo "</select>";

?>
<br/>
<br/>
  <p>Картридж</p>
<?php
$sql = "SELECT * FROM kartridj";

$result_select = mysql_query($sql);

echo "<select name = ''>";

while($object = mysql_fetch_object($result_select)){

echo "<option value = '$object->id' > $object->id </option>";

}

echo "</select>";

?>


</div>
 









    </body>
</html>