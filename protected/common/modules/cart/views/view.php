<?php
use usni\UsniAdaptor;
use cart\widgets\SiteCartSubView;
use yii\bootstrap\Alert;
use products\models\Product;

$this->title = $this->params['breadcrumbs'][] = UsniAdaptor::t('cart', 'Корзина');
if(UsniAdaptor::app()->session->hasFlash('outOfStockCheckoutNowAllowed')) {
    echo Alert::widget(['options' => ['class' => 'alert-danger'], 
                                      'body' => UsniAdaptor::app()->session->getFlash('outOfStockCheckoutNowAllowed')]);
}


$this->params['inner'] = true;
?>



    <div class="cartBlock wrapper">
        <div class="cartBlock-title mainTitleInner">Корзина</div>

        <?php if($cart->getProducts()){ ?>

        <form action="" class="cartBlock-form">
            <div class="cartBlock-orders">

                <?php
                $totalItemsPrice = 0;
                foreach($cart->getProducts() as $item){

                  $totalItemsPrice += (int)$item->totalPrice * (int)$item->qty;

	                $thumb = $this->renderImageByStoreSettings($item, 'thumbnail', 'cart', 155, 155);
                    $product = Product::findOne($item->productId);
	                $props = str_replace($product->getProductManufacturer()->one()->name . ' ' . $product->model, ' ', $product->name); ?>
                <div class="cartBlock-item">
                    <div class="cartBlock-imgWrap"><?=$thumb?></div>
                    <div class="cartBlock-leftGroup">
                        <div class="cartBlock-prodName"><?=$product->getProductManufacturer()->one()->name. ' ' .$item->model?></div>
                        <div class="cartBlock-vendorCode" data-vendorVal="<?=$product->sku?>">Артикул: </div>
                        <div class="cartBlock-status" data-status="available">
                            <div class="cartBlock-statusAvailable">В наличии</div>
                            <div class="cartBlock-statusDisable">Нет в наличии</div>
                        </div>
                    </div>
                    <div class="cartBlock-charact"><?=$props?></div>
                    <div class="cartBlock-price priceBlock priceBlock__onlyCurrent"><?=(int)$item->totalPrice * (int)$item->qty?> грн.</div>
                    <div class="cartBlock-quant">
                        <a href="#" class="cartBlock-operator__minus cartBlock-operator"></a>
                        <input type="number" data-price="<?=(int)$item->totalPrice?>" data-itemcode="<?=$item->itemCode?>" name="qty" value="<?=$item->qty?>" class="cartBlock-quantInput">
                        <a href="#" class="cartBlock-operator__plus cartBlock-operator"></a>
                    </div>
                    <a href="#" class="cartBlock-deleteOrder" data-itemcode="<?=$item->itemCode?>"></a>
                </div>
                <?php } ?>

                <div class="text-right total-items-price">
                    <h3>Итого: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="price"><?=$totalItemsPrice?> грн.</span></h3>
                </div>

            </div>
            <div class="cartBlock-userInfo clearfix">
                <input type="text" class="cartBlock-input" name="name" placeholder="ФИО" required>
                <input type="text" class="cartBlock-input" name="phone" placeholder="Номер телефона" required>
                <input type="text" class="cartBlock-input" name="email" placeholder="Email" required>
            </div>
            <div class="cartBlock-bottom">
                <div class="cartBlock-hint">
                    Наш менеджер перезвонит Вам в течение полу часа, чтобы уточнить детали заказа
                </div>
                <img src="/html/img/dual-ring.svg" alt="" width="30" id="loader"><a href="#" class="buttonGlobal" id="checkout-button">оформить заказ</a>
            </div>
        </form>

        <?php } else {

          echo 'В вашей корзине нет товаров!';

        } ?>
    </div>

    <div class="productShow productShow__inner">
        <div class="wrapper">
            <div class="productShow-titleTop mainTitleInner">хиты продаж:</div>
            <div class="productShow-group productShow-group__active" data-group="topSell">

                <div class="productShow-group productShow-group__active" data-group="topSell">
			            <?=$this->render('@frontend/modules/site/views/_latestproductslist', [
				            'dots'=>'2',
				            'products' => $homePageDTO->getHitProducts()]);?>
                </div>

            </div>
        </div>
    </div>



<?php /*


<h2><?php echo $this->title;?></h2>
<div id="shopping-container">
    <?php
    echo SiteCartSubView::widget();
    ?>
</div>

*/