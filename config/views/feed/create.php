<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../../config.php';
    require_once DIR_MDLS.'feed.php';
    require_once DIR_CTLS.'feedController.php';

    session_start();

    $title = $_POST['title'];
    $image = $_POST['image'];
    $publisher = $_POST['publisher'];
    $body = $_POST['body'];
    $source = $_POST['source'];

    $feedController=new feedController();

    $nFeed = $feedController->createFeed($title,$image,$publisher,$body,$source);

    // Check if image url is valid
    if(filter_var($nFeed->getImage(), FILTER_VALIDATE_URL)){

        // Check if the url is an image
        $headers=get_headers($nFeed->getImage());
        if(!stripos($headers[0],"200 OK")?true:false){

            $nFeed->setImage('app/assets/img/default_feed.png');
            
        }

    }else{

        $nFeed->setImage('app/assets/img/default_feed.png');

    }

    array_push($_SESSION['feed'],$nFeed); 

    $feedController->showFeed($nFeed,sizeof($_SESSION['feed'])-1);

?>