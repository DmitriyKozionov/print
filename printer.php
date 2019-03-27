<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['model']))
{
    $model = trim($_POST['model']);
    $inv = trim($_POST['inv']);


    if ($model !='')
{
  $printer = mysql_real_escape_string($printer);
  $sql = "INSERT INTO printer (model, inv) VALUES ('$model', '$inv')";

  mysql_query($sql);


}
header('Location: printer.php');
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


      <hr/>
  <form method="post">
  <input type = "text" name ="model" placeholder="Модель" />
  <input type ="text" name ="inv" placeholder="Инвентариза́ционный" />


<input type = "submit" value="Добавить принтер"/>
</form>

<hr/>

<table class="tab" border="1" >
  <tr>
   
    <td>Модель</td>
     <td>Инвентариза́ционный номер</td>
    <td>ID_картриджа</td>
    <td>ID_сотрудника</td>
  </tr>

<?php
$result = mysql_query('SELECT * FROM printer');

while ($row = mysql_fetch_assoc($result))

{ 

    echo "<tr>";
    echo '<td>'.$row['model'].'</td>';
    echo '<td>'.$row['inv'].'</td>';
    
    echo "</tr>";   
 

}

?>

</table>

  </body>
</html>
