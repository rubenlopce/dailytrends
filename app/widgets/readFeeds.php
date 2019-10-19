<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'libs/simple_html_dom.php';
require_once 'config/models/feed.php';

session_start();

// Check if there is already a feed created

if(isset($_SESSION['feed'])){
    $arrayStories = $_SESSION['feed'];
}else{
    $arrayStories = array();
}

// Feed of "El Pais"

$html = file_get_html('https://elpais.com/');

for ($i=0; $i < 5; $i++) { 

    $storyLink = $html->find('.articulo-titulo a',$i);

    $nFeed = webScraping($storyLink,'#articulo-titulo','.articulo-subtitulo','meta[property=og:image]','span[class=autor-nombre] a','El País'); 

    if (!checkIfFeedExists($nFeed, $arrayStories)) {
        array_push($arrayStories,$nFeed);
    }

}

// Feed of "El Mundo"

$html = file_get_html('https://www.elmundo.es/');

for ($i=0; $i < 5; $i++) { 

    $storyLink = $html->find('.ue-c-cover-content__link',$i);

    $nFeed = webScraping($storyLink,'.js-headline','.ue-c-article__standfirst','meta[data-ue-u=og:image]','.ue-c-article__byline-name','El Mundo');

    if (!checkIfFeedExists($nFeed, $arrayStories)) {
        array_push($arrayStories,$nFeed);
    }

}

$_SESSION['feed']=$arrayStories;

//Function for web scraping
function webScraping($html,$titleSelector,$bodySelector,$imageSelector,$publisherSelector,$source){
    
    $feed = new Feed();

    $publisher="";
    
    $story = file_get_html($html->href);

    $title = $story->find($titleSelector,0)->plaintext;
    $body = $story->find($bodySelector,0)->plaintext;
    $image = $story->find($imageSelector,0)->content;
    foreach($story->find($publisherSelector) as $author){
        $publisher .= $author->plaintext." ";
    };

    $feed->setTitle($title);
    $feed->setBody($body);
    $feed->setImage($image);
    $feed->setPublisher($publisher);
    $feed->setSource($source);

    return $feed;
}

//Function to check if the the article exists in the Feed to avoid duplicates 

function checkIfFeedExists($object,$array){

    foreach ($array as $item) {

        if($object->getTitle() == $item->getTitle()){
            return true;
        }
        
    }

    return false;

}

?>