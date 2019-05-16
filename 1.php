SELECT sotrydnik.fio, printer.model as printer_model, printer.inv as inv_number, kartridj.id as kartridj_id, kartridj.model, REMONT.vidrab, REMONT.data FROM sotrydnik
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