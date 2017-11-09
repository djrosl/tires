<?php
use usni\UsniAdaptor;
use usni\library\utils\Html;
    
$assetsUrl  = UsniAdaptor::app()->urlManager->baseUrl;
?>
<!--<div class="carousel slide hidden-xs" data-ride="carousel" id="carousel-captions">-->
<!--    <ol class="carousel-indicators">-->
<!--        <li class="active" data-slide-to="0" data-target="#carousel-captions">&nbsp;</li>-->
<!--        <li data-slide-to="1" data-target="#carousel-captions">&nbsp;</li>-->
<!--        <li data-slide-to="2" data-target="#carousel-captions">&nbsp;</li>-->
<!--    </ol>-->
<!---->
<!--    <div class="carousel-inner" style="">-->
<!--        <div class="item active">--><?php //echo Html::img($assetsUrl . '/images/MacBookAir.jpg');?><!--</div>-->
<!---->
<!--        <div class="item ">--><?php //echo Html::img($assetsUrl . '/images/iPhone6.jpg');?><!--</div>-->
<!---->
<!--        <div class="item ">--><?php //echo Html::img($assetsUrl . '/images/slide4-1140x380.png');?><!--</div>-->
<!--    </div>-->
<!--    <a class="left carousel-control" data-slide="prev" href="#carousel-captions"><span class="icon-prev"></span> </a>-->
<!--    <a class="right carousel-control" data-slide="next" href="#carousel-captions"> <span class="icon-next"></span> </a>-->
<!--</div>-->

<div class="mainBlock">
    <div class="wrapper">
        <?=\frontend\widgets\FilterFrontWidget::widget()?>
    </div>
    <div class="mainBlock-slider owl-carousel">
        <?php foreach($slides as $slide){ ?>
        <div class="mainBlock-sliderItem">
            <?=usni\library\utils\FileUploadUtil::getThumbnailImage($slide, 'image', [
	            'thumbWidth' => 1920, 'thumbHeight' => 576
            ]);?>
            <div class="mainBlock-slideTitle"><?=$slide['title']?></div>
        </div>
        <?php } ?>
    </div>

    <div class="carousel-controlsWrap carousel-controlsWrap__absolute">
        <div class="carousel-customControls carousel-customControls__floatR">
            <a href="#" class="navCarouselBtn prevSlide"></a>
            <div class="custom-owl-dots"></div>
            <a href="#" class="navCarouselBtn nextSlide"></a>
        </div>
    </div>
</div>