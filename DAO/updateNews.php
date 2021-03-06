<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'news_proyect');
$queryN = "UPDATE news SET enabled = false";
$resultN = mysqli_query($conn, $queryN);

$queryNS = "SELECT * FROM news_sources WHERE enabled = true";
$resultNS = mysqli_query($conn, $queryNS);
while($row = mysqli_fetch_array($resultNS)){
    $i = 0;
    $url = $row[1];
    $id_news_source = $row[0];
    $id_user = $row[5];
    $id_category = $row[4];
    $rss = simplexml_load_file($url);
    foreach($rss->channel->item as $item) {
        $title = $item->title; //get title
        $description = strip_tags($item->description); //get description
        $link = $item->link; //get link-permanlink
        $dateN = $item->pubDate; //get date
        $dateF = pubDateToMySql($dateN);
        if (strlen($description) > 200) { //limit to 200 characters
        $stringCut = substr($description, 0, 200);
        $description = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        $description = str_replace('"', " ", $description);
        $description = str_replace("'", " ", $description);
        $title = str_replace("'", "", $title);
        $title = str_replace('"', "", $title);
        }
        if ($i < 10) { //get only 10 news
            $query = "INSERT INTO news(title, short_description, permanlink, date, enabled, id_news_source, id_user, id_category) VALUES('$title', '$description', '$link', '$dateF', true, '$id_news_source', '$id_user', '$id_category')";
            $result = mysqli_query($conn, $query);
        }
        $i++;
    }
}
header("Location: ../GUI/index.php");

/**
 * Get the date in format fot the database
 */
function pubDateToMySql($str){
    return date('Y-m-d H:i:s', strtotime($str));
};
