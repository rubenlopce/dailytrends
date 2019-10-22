<?php 

    require_once 'config/config.php';
    require_once DIR_CTLS.'feedController.php';
    require_once 'app/widgets/readFeeds.php';

?>

<html>

    <header>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="app/assets/css/style.css">
        <link rel="stylesheet" href="app/assets/css/header.css">
        <link rel="stylesheet" href="app/assets/css/footer.css">
        <link rel="stylesheet" href="app/assets/css/modal.css">
    </header>

    <body>

    <?php include DIR_BLOCKS.'header.php'; ?>
    
    <section class='feedContainer '>
    
        <?php

            $feedController=new feedController();

            $feedController->showAll($_SESSION['feed']);

        ?>

    </section>


    <?php
     require_once DIR_WIDGETS.'detailsForm.php';
     require_once DIR_WIDGETS.'createForm.php';

        include DIR_BLOCKS.'footer.php';

       

    ?>   

    <div id='button-create'></div>

    <script>
        var feed_array = <?=json_encode($_SESSION['feed'])?>
    </script>
    <script src="app/assets/js/feed.js"></script>
    <script src="app/assets/js/script.js"></script>

   </body>

</html>