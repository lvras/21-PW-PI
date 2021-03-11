<?php
session_start();

function ReedNews($feedURL, $id_news_source, $id_user, $id_category){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'news_proyect');
    $i = 0;
    $url = $feedURL;
    $rss = simplexml_load_file($url);
    foreach($rss->channel->item as $item) {
        $title = $item->title;  //extrae el titulo
        $description = strip_tags($item->description);  //extrae la descripcion
        $link = $item->link;  //extrae el link
        $dateN = $item->pubDate;  //extrae la fecha
        $dateF = pubDateToMySql($dateN);
        if (strlen($description) > 200) { //limita la descripcion a 200 caracteres
        $stringCut = substr($description, 0, 200);
        $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        $description = str_replace('"', " ", $description);
        }
        if ($i < 10) { // extrae solo 16 items
            $query = "INSERT INTO news(title, short_description, permanlink, date, enabled, id_news_source, id_user, id_category) VALUES('$title', '$description', '$link', '$dateF', true, '$id_news_source', '$id_user', '$id_category')";
            $result = mysqli_query($conn, $query);
            // $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        $i++;
    }
    header("Location: ../GUI/sources.php");
}

function pubDateToMySql($str){
    return date('Y-m-d H:i:s', strtotime($str));
};
?>
