<?php
use usni\UsniAdaptor;

$listDescrLimit     = UsniAdaptor::app()->storeManager->getSettingValue('list_description_limit');
$allowWishList      = UsniAdaptor::app()->storeManager->getSettingValue('allow_wishlist');
$allowCompare       = UsniAdaptor::app()->storeManager->getSettingValue('allow_compare_products');
//Product image width and geight
$productWidth       = UsniAdaptor::app()->storeManager->getImageSetting('product_list_image_width', 150);
$productHeight      = UsniAdaptor::app()->storeManager->getImageSetting('product_list_image_height', 150);
?>


<div class="productShow-carousel owl-carousel clearfix">

    <?php if(!empty($products)){
	    foreach($products as $product){
		    echo $this->render('_productcarouselitem', [
			    'model' => $product,
			    'listDescrLimit' => $listDescrLimit,
			    'productWidth' => $productWidth,
			    'productHeight'=> $productHeight,
			    'allowWishList' => $allowWishList,
			    'allowCompare' => $allowCompare,
			    'containerOptions' => ['class' => 'product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12']
		    ]);
	    }
    } ?>

</div>

<div class="carousel-controlsWrap">
    <div class="carousel-customControls carousel-customControls__gray">
        <a href="#" class="navCarouselBtn prevSlide"></a>
        <div class="custom-owl-dots-<?=$dots?>"></div>
        <a href="#" class="navCarouselBtn nextSlide"></a>
    </div>
</div>