<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 29.09.2017
 * Time: 16:10
 */


use usni\UsniAdaptor;
use usni\library\utils\FileUploadUtil;
use products\widgets\PriceWidget;
use usni\library\utils\Html;

$addCartLabel       = UsniAdaptor::t('cart', 'Add to Cart');
$addWishListLabel   = UsniAdaptor::t('wishlist', 'Add to Wish List');
$addCompareLabel    = UsniAdaptor::t('products', 'Add to Compare');

$attribute = \products\models\ProductAttributeMapping::getMapping($model['id'], 6);

if($attribute){
    switch($attribute->attribute_value){
        case 'зимняя':
            $classes = 'seasonBlock__winter';
            break;
        case 'літня':
            $classes = 'seasonBlock__summer';
            break;
        default:
            $classes = 'seasonBlock__winter seasonBlock__summer';
            break;
    }
} else {
	$classes = '';
}


?>

<div class="productCard">
	<div class="productCard-vendorCode" data-vendorval="<?=$model['sku']?>">Артикул: </div>
	<div class="productCard-imgWrap"><?php echo FileUploadUtil::getThumbnailImage($model, 'image', [
		'thumbWidth' => $productWidth, 'thumbHeight' => $productHeight
		]); ?></div>
	<div class="productCard-title"><?=$model['name']?></div>
<!--	<div class="productCard-charact">205/55 R16 91V</div>-->
	<div class="seasonBlock <?=$classes?>"></div>
	<div class="priceBlock"><?=(int)$model['price']?> грн.</div>
	<a href="<?php echo UsniAdaptor::createUrl('/catalog/products/site/detail', ['id' => $model['id']]); ?>" class="buttonGlobal">подробнее</a>
</div>
