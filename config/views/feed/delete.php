<?php

    require_once '../../config.php';
    require_once DIR_MDLS.'feed.php';
    require_once DIR_CTLS.'feedController.php';

    session_start();

    $feedController=new feedController();

    $feedArray = $feedController->deleteFeed($_POST['posFeedDelete'],$_SESSION['feed']);

    $_SESSION['feed']=$feedArray;

    header('Location:../../../index.php');

?>