<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['fio']))
{   
	$fio = trim($_POST['fio']);
        


  $sotrydnik = mysql_real_escape_string($sotrydnik);



   $sql = "INSERT INTO sotrydnik (fio) VALUES ('$fio')";
  mysql_query($sql);

header('Location: sotrydnik.php');
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
      <div class="zagolovok"><h2>Сотрудник</h2></div>


      <hr/>

  <form method="post">
  <input type = "text" name = "fio" placeholder="ФИО" />
  <input type = "submit" value="Добавить сотрудника"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
    <td>ФИО</td>
     <td>Отдел</td>
   </tr>
   <?php
$result = mysql_query('SELECT * FROM sotrydnik');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['fio'].'</td>';
   
    
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>