<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'config/config.php';
    require_once DIR_CTLS.'feedController.php';
    require_once 'app/widgets/readFeeds.php';

    $feedController=new feedController();

    $feedController->showAll($_SESSION['feed']);

    require_once DIR_WIDGETS.'detailsForm.php';
    require_once DIR_WIDGETS.'createForm.php';


?>

<script>

    var feed_array = <?=json_encode($_SESSION['feed'])?>

</script>
<script src="app/assets/js/feed.js"></script>