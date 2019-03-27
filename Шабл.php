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