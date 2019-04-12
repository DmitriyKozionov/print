<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');

if (isset($_POST['nazv']))
{   
	$nazv = trim($_POST['nazv']);
        


  $otdel = mysql_real_escape_string($otdel);



   $sql = "INSERT INTO otdel (nazv) VALUES ('$nazv')";
  mysql_query($sql);

header('Location: otdel.php');
exit();
}
?>
<html>

    <head>
    
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Отдел</h2></div>


      <hr/>

  <form method="post">
  <input type = "text" name = "nazv" placeholder="Название" />
  <input type = "submit" value="Добавить отдел"/>
</form>

<hr/>
<div class="btab">
<table class="tab" border="1" >
  <tr>
   
    <td>ID</td>
   
     <td>Название</td>
   </tr>
   <?php
$result = mysql_query('SELECT * FROM otdel');

while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['nazv'].'</td>';
   
    
    echo "</tr>";   
 

}

?>

</table>
</div>
  </body>
</html>