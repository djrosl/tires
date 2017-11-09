<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;

/* @var $listViewDTO \productCategories\dto\ProductCategoryListViewDTO */
/* @var $this \frontend\web\View */

$this->params['categoryList'] = $listViewDTO->getCategoryList();
$this->params['model']  = $listViewDTO->getSearchModel();
$this->leftnavView  = '//common/searchform';

$title              = UsniAdaptor::t('application', 'Результаты поиска');
$this->title        = $this->params['breadcrumbs'][] = $title;
$this->params['inner'] = true;


?>

    <div class="wrapper clearfix">
		<?= $this->render('//common/_searchresults', [
		    'listViewDTO' => $listViewDTO,
		    'title' => $title,
		    'hidesort'=>true
		    ]); ?>
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




