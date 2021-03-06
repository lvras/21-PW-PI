<?php

function feed($feedURL){
$i = 0;
$url = $feedURL;
$rss = simplexml_load_file($url);
    foreach($rss->channel->item as $item) {
        $link = $item->link;  //extrae el link
        $title = $item->title;  //extrae el titulo
        $date = $item->pubDate;  //extrae la fecha
        $guid = $item->guid;  //extrae el permanlink
        $description = strip_tags($item->description);  //extrae la descripcion
        if (strlen($description) > 400) { //limita la descripcion a 200 caracteres
        $stringCut = substr($description, 0, 200);
        $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        }
        if ($i < 16) { // extrae solo 16 items
            echo '<div class="cuadros1"><h4><a href="'.$link.'" target="_blank">'.$title.'</a></h4><br><p>'.$guid.'</p><br>'.$description.'<br><div class="time">'.$date.'</div></div>';
        }
        $i++;
    }
	echo '<div style="clear: both;"></div>';
}
?>
<?php feed("https://feeds.feedburner.com/crhoy/wSjk") ?>