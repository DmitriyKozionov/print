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
?>
<html>

    <head>
    
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Работа с принтером</h2></div>


      <hr/>

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
<div class="btab">
<table class="tab" border="1" >
  <tr>
    <td>ID</td>
    <td>Принтер</td>
    <td>Работа</td>
     <td>Дата</td>
    
   </tr>
   <?php

$result = mysql_query('SELECT * FROM remprint');

while ($row = mysql_fetch_assoc($result))


{ 

    echo '<tr>';
  
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['idprint'].'</td>';
    echo '<td>'.$row['idrabot'].'</td>';
    echo '<td>'.$row['data'].'</td>';
 
   
    
    echo '</tr>';   
 

}

?>

</table>
</div>
  </body>
</html>