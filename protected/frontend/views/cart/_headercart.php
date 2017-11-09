<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl.html
 */
use usni\UsniAdaptor;
use usni\fontawesome\FA;

?>


<a href="<?=\usni\UsniAdaptor::createUrl('cart/default/view');?>" class="headerTop-cartWrap">
    <span class="headerTop-cartItem headerTop-cartItem__redBg"><span class="headerTop-cart">Корзина</span></span>
    <span class="headerTop-cartItem headerTop-cartItem__blueBg"><span class="headerTop-cartVal" data-quant="<?=$itemCount?>">тов.</span></span>
</a>

