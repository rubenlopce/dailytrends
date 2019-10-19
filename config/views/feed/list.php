<div data-number='<?= $key ?>'>

    <img src="<?=$feed->getImage();?>" alt="">
    <h1><?=$feed->getTitle();?></h1>
    <p><?=$feed->getPublisher();?></p>
    <p><?=$feed->getBody();?></p>
    <small><?=$feed->getSource();?></small>

</div>
