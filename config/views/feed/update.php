<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../../config.php';
    require_once DIR_MDLS.'feed.php';
    require_once DIR_CTLS.'feedController.php';

    session_start();

    $position = $_POST['posFeed'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $publisher = $_POST['publisher'];
    $body = $_POST['body'];
    $source = $_POST['source'];

    // Check if image url is valid
    if(filter_var($image, FILTER_VALIDATE_URL)){

        // Check if the url is an image
        $headers=get_headers($image);
        if(!stripos($headers[0],"200 OK")?true:false){
    
            $image='app/assets/img/default_feed.png';
                
        }
    
    }else{
    
        $image='app/assets/img/default_feed.png';
    
    }

    $feedController=new feedController();

    $feedArray = $feedController->updateFeed($title,$image,$publisher,$body,$source,$position,$_SESSION['feed']);

    $_SESSION['feed']=$feedArray;

?>