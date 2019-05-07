<?php
function a1 ()
{
$result = mysql_query('SELECT printer.ID, printer.inv, .printer.model, printer.idsotr, GROUP_CONCAT(kartridj.id) as Kartiges, sotrydnik.fio  FROM printer
LEFT JOIN print_link_kart
ON printer.ID = print_link_kart.id_print

LEFT JOIN kartridj
ON print_link_kart.id_kart = kartridj.id

LEFT JOIN sotrydnik
ON printer.idsotr = sotrydnik.id
GROUP BY printer.ID');

	$arr = array();

while ($row = mysql_fetch_assoc($result))
	$arr[] = $row;

return $arr;
}


?>