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
  $sql = "INSERT INTO kartridj (model, id_printera) VALUES ('$model', '$id_printera')";

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
    
    <td>Модель</td>
    <td>№ Принтера</td>
  
  </tr>

<?php
$result = mysql_query('SELECT * FROM kartridj');

while ($row = mysql_fetch_assoc($result))

{ 

    echo "<tr>";

    echo '<td>'.$row['model'].'</td>';
    echo '<td>'.$row['id_printera'].'</td>';
   
    echo "</tr>";   
 

}

?>

</table>    

    </body>
</html>