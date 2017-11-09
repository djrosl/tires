<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\UsniAdaptor;
use yii\widgets\ListView;
use productCategories\widgets\ToolbarWidget;

/* @var $listViewDTO \frontend\dto\ListViewDTO */
/* @var $this \frontend\web\View */

$title = isset($title) ? $title : '';
$hidesort = isset($hidesort) ? $hidesort : false;

$itemView           = '@products/views/front/_productitem2';
//View params
$productWidth       = UsniAdaptor::app()->storeManager->getImageSetting('product_list_image_width', 150);
$productHeight      = UsniAdaptor::app()->storeManager->getImageSetting('product_list_image_height', 150);
$listDescrLimit     = UsniAdaptor::app()->storeManager->getSettingValue('list_description_limit');
$allowWishList      = UsniAdaptor::app()->storeManager->getSettingValue('allow_wishlist');
$allowCompare       = UsniAdaptor::app()->storeManager->getSettingValue('allow_compare_products');
$containerOptions   = ['class' => 'product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12'];
$viewParams         = ['productWidth'       => $productWidth, 
                       'productHeight'      => $productHeight,
                       'listDescrLimit'     => $listDescrLimit, 
                       'allowWishList'      => $allowWishList,
                       'allowCompare'       => $allowCompare,
                       'containerOptions'   => $containerOptions];
$listViewParams = [
                    'dataProvider'      => $listViewDTO->getDataprovider(),
                    'itemView'          => $itemView,
                    'viewParams'        => $viewParams,
                    'id'                => 'search-results-list-view',
                    'options'           => ['id' => 'searchresultslistview-pjax'],
                    'layout'            => "<div class='catalogueBlock' id='search-results-list-view'>
                                                <div class=\"catalogueBlock-title\">
                                                    <div class=\"mainTitleInner mainTitleInner__inline\">$title</div>
                                                    ". ($hidesort ? '' : "<select class=\"catalogueBlock-select\" name=\"sort\" id='categorySortBy'>
                                                        <option value=\"priceasc\" ".(UsniAdaptor::app()->request->get('sort') === 'priceasc' ? 'selected' : '').">Сортировать по цене &darr;</option>
                                                        <option value=\"pricedesc\" ".(UsniAdaptor::app()->request->get('sort') === 'pricedesc' ? 'selected' : '').">Сортировать по цене &uarr;</option>
                                                        <option value=\"nameasc\" ".(UsniAdaptor::app()->request->get('sort') === 'nameasc' ? 'selected' : '').">Сортировать по имени &darr;</option>
                                                        <option value=\"namedesc\" ".(UsniAdaptor::app()->request->get('sort') === 'namedesc' ? 'selected' : '').">Сортировать по имени &uarr;</option>
                                                    </select>") ."
                                                </div>
                                                <div class='catalogueBlock-cardsWrap'>{items}</div>
                                                <div class='catalogueBlock-pagin pagin'>{pager}</div>
                                            </div>",
                  ];

echo ListView::widget($listViewParams);