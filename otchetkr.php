<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('bdprint');


   
    $data1 = trim($_POST['data']);
    $data2 = trim($_POST['data2']);


?>


<html>

    <head>
    
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
        <title>Контент</title>
    </head>
    <body>
      <div class="zagolovok"><h2>Отдел</h2></div>


      <hr/>

  <form method="post">
  <input type = "date" name ="data"  value="ДД/ММ/ГГГГ">
  -
  <input type = "date" name ="data2" value="ДД/ММ/ГГГГ">
  <input type = "submit" value="Вывести"/>
  <button class="myprint">Печать</button>
</form>

<hr/>
<script>
$(function(){
$('.myprint').click(function(){             //при клике на что срабатывает печать
var html_to_print=$('.to_print').html();    //что печатаем
var iframe=$('<iframe id="print_frame">');
$('body').append(iframe);
var doc = $('#print_frame')[0].contentDocument || $('#print_frame')[0].contentWindow.document;
var win = $('#print_frame')[0].contentWindow || $('#print_frame')[0];
doc.getElementsByTagName('body')[0].innerHTML=html_to_print;
win.print();
$('iframe').remove();
});
});
</script>

<style>#print_frame{display: none;}</style>
<div class='to_print'>
<div class="btab" >
<table class="tab" border="1" >
  <tr>
   
    <td>Фио</td>
    <td>Принтер</td>
    <td>Номер принтера</td>
    <td>Id картриджа</td>
    <td>Модель картриджа</td>
    <td>Вид работ</td>
    <td>Дата</td>
    <td>Подпись</td>
   </tr>
   <tr>

<?php

$result = mysql_query("SELECT sotrydnik.fio, printer.model as printer_model, printer.inv as inv_number, kartridj.id as kartridj_id, kartridj.model, REMONT.vidrab, REMONT.data FROM sotrydnik
LEFT JOIN printer 
ON printer.idsotr = sotrydnik.id
LEFT JOIN print_link_kart 
ON printer.ID = print_link_kart.id_print
LEFT JOIN kartridj
ON print_link_kart.id_kart = kartridj.id
RIGHT JOIN 
    (
        SELECT remkartr.idkart, remkartr.idrabot, vidrab.name  as vidrab, remkartr.data FROM remkartr        
        LEFT JOIN
        vidrab 
        ON vidrab.id = remkartr.idrabot
        ) AS REMONT

ON  REMONT.idkart = print_link_kart.id_kart 
WHERE REMONT.data BETWEEN '$data1' AND '$data2' 


Union all

SELECT sotrydnik.fio, printer.model as printer_model, printer.inv as inv_number,'---' AS Pustoy,'---' AS Pustoy, REMONT.vidrab, REMONT.data FROM sotrydnik
LEFT JOIN printer 
ON printer.idsotr = sotrydnik.id

RIGHT JOIN 
    (
        SELECT remprint.idprint, remprint.idrabot, vidrab.name  as vidrab, remprint.data FROM remprint
           
        LEFT JOIN
        vidrab 
        ON vidrab.id = remprint.idrabot
    WHERE remprint.data BETWEEN '$data1' AND '$data2'
           
    ) AS REMONT

ON  REMONT.idprint = printer.id

");



while ($row = mysql_fetch_assoc($result))


{ 

    echo "<tr>";
    echo '<td>'.$row['fio'].'</td>';
    echo '<td>'.$row['printer_model'].'</td>';
    echo '<td>'.$row['inv_number'].'</td>';
    echo '<td>'.$row['kartridj_id'].'</td>';
    echo '<td>'.$row['model'].'</td>';
    echo '<td>'.$row['vidrab'].'</td>';
    echo '<td>'.$row['data'].'</td>';
     echo '<td>'.$row[''].'</td>';

  
    
    echo "</tr>";    
}
?>
</table>
</div>
</div>

  </body>
</html>
