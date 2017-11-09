<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\library\widgets\Thumbnail;

/* @var $listViewDTO \productCategories\dto\ProductCategoryListViewDTO */
/* @var $this \frontend\web\View */

$productCat         = $listViewDTO->getProductCategory();
$title              = $productCat['name'];
$this->title        = $this->params['breadcrumbs'][] = $title;

$this->params['productCategory'] = $productCat;
$this->leftnavView  = '/front/_sidebar';


$this->params['inner'] = true;


?>


    <div class="wrapper clearfix">
        <aside class="asideFilter">

            <?=\frontend\widgets\FilterFrontWidget::widget(['type'=>'_catalogfilter'])?>

        </aside>
        <?= $this->render('//common/_searchresults', ['listViewDTO' => $listViewDTO, 'title' => $title]); ?>
    </div>

    <div class="productShow productShow__inner">
        <div class="wrapper">
            <div class="productShow-titleTop mainTitleInner">популярные товары:</div>
            <div class="productShow-group productShow-group__active" data-group="topSell">
                <?=$this->render('@frontend/modules/site/views/_latestproductslist', [
				'dots'=>'2',
				'products' => $homePageDTO->getHitProducts()]);?>
            </div>
        </div>
    </div>
