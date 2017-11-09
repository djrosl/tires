<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\library\utils\Html;
use frontend\assets\AppAsset;
use usni\library\widgets\Alert;
use common\modules\stores\business\ConfigManager;

/* @var $this \frontend\web\View */

AppAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex,nofollow"/>
        <link rel="icon" type="image/ico" href="<?php echo $this->getFavIcon(); ?>" />
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title); ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody();
        echo $this->renderHeader();
        echo Alert::widget();
        echo $content; ?>

        <footer class="mainFooter">
            <div class="wrapper">
	            <?=$this->renderNavBar();?>
                <div class="mainFooter-contacts">
                    <a href="mailto:<?=ConfigManager::getInstance()->getLocalValue('email')?>" class="mainFooter-mail"><?=ConfigManager::getInstance()->getLocalValue('email')?></a>
                    <a href="tel:<?=ConfigManager::getInstance()->getLocalValue('phone')?>" class="mainFooter-phone"><?=ConfigManager::getInstance()->getLocalValue('phone')?></a>
                    <a href="#" class="buttonGlobal buttonGlobal__transparent button__callback">заказать звонок</a>
                </div>
                <div class="mainFooret-copy">
                    <a href="#" class="mainFooter-company">
                        <span class="mainFooter-accent">Proskuriv</span> shina
                    </a>
                    <div class="mainFooter-right">© Copyright</div>
                </div>
            </div>
        </footer>
        <?php $this->endBody(); 
        ?>
    </body>
</html>
<?php $this->endPage();