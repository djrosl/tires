<?php
use usni\UsniAdaptor;
use common\modules\stores\business\ConfigManager;

/* @var $this \frontend\web\View */
/* @var $homePageDTO \frontend\dto\HomePageDTO */

$this->title = UsniAdaptor::t('application', 'Home');

echo $this->render('/_carousel', ['slides'=>$slides]);

?>




	<div class="advantages wrapper">
		<div class="advantages-title mainTitle">
			<div class="mainTitle-step">1.</div>
			<div class="mainTitle-accent">Преимущества</div>
			<div class="mainTitle-sub">нашей компании</div>
		</div>

		<div class="advantages-wrap clearfix">
			<div class="advantages-item">
				<div class="advantages-head advantages-head__img1"></div>
				<div class="advantages-subTitle">Более 20 лет на рынке</div>
			</div>
			<div class="advantages-item">
				<div class="advantages-head advantages-head__img2"></div>
				<div class="advantages-subTitle">Товар в наличии на складе</div>
			</div>
			<div class="advantages-item">
				<div class="advantages-head advantages-head__img3"></div>
				<div class="advantages-subTitle">Оплата при получении</div>
			</div>
		</div>
	</div>

	<div class="productShow">
		<div class="wrapper">
			<div class="productShow-nav clearfix">
				<a href="#" class="navBtnGlobal navBtnGlobal__w240 navBtnGlobal__checked" data-btn-target="topSell">хиты продаж</a>
				<a href="#" class="navBtnGlobal navBtnGlobal__w240" data-btn-target="new">новинки</a>
				<a href="#" class="navBtnGlobal navBtnGlobal__w240" data-btn-target="action">акционный товар</a>
			</div>

			<div class="productShow-group productShow-group__active" data-group="topSell">
				<?=$this->render('/_latestproductslist', [
				'dots'=>'2',
				'products' => $homePageDTO->getHitProducts()]);?>
			</div>

			<div class="productShow-group" data-group="new">
				<?=$this->render('/_latestproductslist', [
				'dots'=>'3',
				'products' => $homePageDTO->getLatestProducts()]);?>
			</div>

			<div class="productShow-group" data-group="action">
				<?=$this->render('/_latestproductslist', [
				'dots'=>'4',
				'products' => $homePageDTO->getActionProducts()]);?>
			</div>

		</div>
	</div>

	<div class="reviewBlock wrapper">
		<div class="reviewBlock-title mainTitle">
			<div class="mainTitle-step">2.</div>
			<div class="mainTitle-accent">отзывы</div>
			<div class="mainTitle-sub">наших клиентов</div>
		</div>

		<div class="reviewBlock-slider owl-carousel">
			<?php foreach($testimonials as $testimonial){ ?>
            <div class="reviewBlock-item">
				<div class="reviewBlock-avatar">
					<div class="reviewBlock-imgWrap"><?=usni\library\utils\FileUploadUtil::getThumbnailImage($testimonial, 'image', [
                        'thumbWidth' => 105, 'thumbHeight' => 102
                      ]);?></div>
				</div>
				<div class="reviewBlock-name"><?=$testimonial['name']?></div>
				<div class="reviewBlock-text">
                    <?=$testimonial['text']?>
				</div>
			</div>
            <?php } ?>
		</div>

		<div class="carousel-controlsWrap">
			<div class="carousel-customControls carousel-customControls__gray">
				<a href="#" class="navCarouselBtn prevSlide"></a>
				<div class="custom-owl-dots-5"></div>
				<a href="#" class="navCarouselBtn nextSlide"></a>
			</div>
		</div>
	</div>

	<div class="aboutBlock">
		<div class="wrapper">
			<div class="aboutBlock-title mainTitle">
				<div class="mainTitle-step mainTitle-step__grayBg">3.</div>
				<div class="mainTitle-accent">о компании</div>
				<div class="mainTitle-sub">и нашем интернет-магазине</div>
			</div>

			<div class="aboutBlock-text">
				<?=ConfigManager::getInstance()->getLocalValue('about')?>
			</div>

		</div>
	</div>

