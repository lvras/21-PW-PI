<?php

$file = $argv[1];

$i = 0;
$url = $file;
$rss = simplexml_load_file($url);
    foreach($rss->channel->item as $item) {
        $link = $item->link;  //extrae el link
        $title = $item->title;  //extrae el titulo
        $date = $item->pubDate;  //extrae la fecha
        $guid = $item->guid;  //extrae el permanlink
        $description = strip_tags($item->description);  //extrae la descripcion
        if (strlen($description) > 200) { //limita la descripcion a 200 caracteres
        $stringCut = substr($description, 0, 200);
        $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        }
        if ($i < 2) { // extrae solo 16 items
            echo 'Titulo: '.$title.PHP_EOL;
            echo 'Fecha: '.$date.PHP_EOL;
            echo 'Descripcion: '.$description.PHP_EOL;
            echo 'Link: '.$guid.PHP_EOL;
            echo 'Link v2: '.$link.PHP_EOL;
            echo PHP_EOL;
        }
        $i++;
    }
?>
