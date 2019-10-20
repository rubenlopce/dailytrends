<div>

    <img src="<?=$feed->getImage();?>" alt="">
    <h1><?=$feed->getTitle();?></h1>
    <p><?=$feed->getPublisher();?></p>
    <p><?=$feed->getBody();?></p>
    <small><?=$feed->getSource();?></small>
    <button class='details' value='<?= $key ?>'>Detalles</button>

</div>
