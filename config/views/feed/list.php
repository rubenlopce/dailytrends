<article class='feedContainer__box' id='feedContainer__box__<?= $key ?>'>

    <div class="feedContainer__box__img" style="background:url(<?=$feed->getImage();?>);"></div>
    
    <div class="feedContainer__box__body">

        <div class="feedContainer__box__body__title">

            <h3><?=$feed->getTitle();?></h3>
            <hr>
            <small class="feedContainer__box__body__title_publisher"><?=$feed->getPublisher();?></small>
            
        </div>
        
        <div class="feedContainer__box__body__description">

            <p><?=$feed->getBody();?></p>
            <small><?=$feed->getSource();?> | <a href='<?=$feed->getLinkfeed();?>' target='_blank'>Leer más...</a></small>
            
        </div>

        <div class="feedContainer__box__body__info">

            <button value='<?= $key ?>' class="feedContainer__box__body__info__details">Detalles</button>

        </div>
       
    </div>

</article>
