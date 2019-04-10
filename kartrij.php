<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');
if ($_POST['action'] == 'add_printer_link_kartridj')
{
  $id_kart = trim($_POST['id_kart']);
  $id_print = trim($_POST['id_print']);
  $sql_1 = "INSERT INTO print_link_kart (id_print, id_kart) VALUES ('$id_kart', '$id_print')";  
 mysql_query($sql_1);}
  if ($_POST['action'] == 'add_kartridj')
 {
  $id_printera = trim($_POST['id_printera']);
  $kartridj = mysql_real_escape_string($kartridj);
  $sql = "INSERT INTO kartridj ( model, id_printera) VALUES ('$model', '$id_printera')";
  mysql_query($sql);}


  ?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" type="text/css" href="style.css">
  
    </head>
    <body >
       <div class="zagolovok"><h2>Картридж</h2></div>

         <hr/>
   <form method="post">
  <input type = "text" name ="model" placeholder="Модель" />
<input class='a1' type = "text" name ="action" value="add_kartridj" />
  <input type = "submit" value="Добавить картридж"/>
  </form>
         <hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
    <td>id</td>
    <td>Модель</td>

  
  </tr>


<?php

$result = mysql_query('SELECT * FROM kartridj');
while ($row = mysql_fetch_assoc($result))
{ 
    echo "<tr>";
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['model'].'</td>';
    
   
    echo "</tr>";   
 
}
?>

</table> 
</div>

<form method="post">

<div class="f1">
  <p>Принтер</p>

<?php
$sql = "SELECT * FROM printer";
$result_select = mysql_query($sql);
echo "<select name = 'id_kart'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->ID' > $object->ID $object->model </option>";
}
echo "</select>";
?>

<br/>
<br/>
  <p>Картридж</p>


<?php
$sql = "SELECT * FROM kartridj";
$result_select = mysql_query($sql);
echo "<select name = 'id_print'>";
while($object = mysql_fetch_object($result_select)){
echo "<option value = '$object->id' > $object->id $object->model </option>";
}
echo "</select>";
?>
<input class='a1' type = "text" name ="action" value="add_printer_link_kartridj"/>

<input type = "submit" value="Добавить"/>
</form>
</div>
 </body>
</html>