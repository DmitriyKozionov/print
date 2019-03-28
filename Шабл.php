   echo '<td><select name="hero">
    <option value="s1">'.$row['id'].'</option></td>';
       echo <select name="hero">
    <option value="s1">$row['id']</option>;
    <?
$res = mysql_query('SELECT * from kartridj');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>"></option>
    <?
}
?>
</select>
Рассмотрим как на php создать форму с выпадающим списком, причем значения в этом списке должны браться из базы данных MySQL. Для этого будем использовать php функцию mysql_fetch_object.

mysql_fetch_object - oбрабатывает ряд результата запроса и возвращает объект со свойствами, соответствующими колонкам в обработанном ряду или FALSE, если рядов больше нет, работать с полями можно только по имени колонок.

Пример кода для организации выпадающего списка на php
Описание параметров:

ip - ip-адрес сервера с установленной базой данных.
login - логин для соединения с базой данных.
password - пароль для соединения с базой данных.
name_db - имя базы данных.
name_table - имя таблицы.
column_name - имя столбца таблицы.

<?php

/*Соединяеся с базой и делаем выборку из таблицы*/



$sql = "SELECT * FROM name_table";

$result_select = mysql_query($sql);

/*Выпадающий список*/

echo "<select name = ''>";

while($object = mysql_fetch_object($result_select)){

echo "<option value = '$object->column_name' > $object->column_name </option>";

}

echo "</select>";

?>

Вот и все.