<?php
use common\modules\stores\business\ConfigManager;

/* @var $this \frontend\web\View */
?>

<header class="mainHeader <?=!empty($this->params['inner']) && $this->params['inner'] ?  'mainHeader__inner' : ''?>">
    <div class="headerTop wrapper">
        <a href="/" class="headerTop-logo"><img src="/html/img/icons/logo.jpg" alt="Шина Проскурів"></a>
        <a href="#" class="headerTop-button buttonGlobal button__callback">заказать звонок</a>
        <a href="mailto:<?=ConfigManager::getInstance()->getLocalValue('email')?>" class="headerTop-mail"><?=ConfigManager::getInstance()->getLocalValue('email')?></a>
        <a href="tel:<?=ConfigManager::getInstance()->getLocalValue('phone')?>" class="headerTop-phone"><?=ConfigManager::getInstance()->getLocalValue('phone')?></a>

      <?=$this->render("//cart/_minicart")?>


    </div>
    <div class="headerNav <?=!empty($this->params['inner']) && $this->params['inner'] ?  'headerNav__inner' : ''?>">
        <div class="wrapper">
            <?=$this->renderNavBar();?>
            <?=$this->render("//common/_navSearch");?>
        </div>
    </div>
</header>