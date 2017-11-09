<?php
use usni\library\utils\Html;

/* @var $this \frontend\web\View */
$this->title = $page['name'];
$this->params['breadcrumbs'][] = ['label' => $page['name']];

$this->params['inner'] = true;

$offices = \common\models\Office::find()->all();
$phones = \common\models\Office::find()->select('phone')->distinct()->all();
$addresses = \common\models\Office::find()->select('address')->distinct()->all();
$emails = \common\models\Office::find()->select('email')->distinct()->all();

function get_lat_long($address){

	$address = str_replace(" ", "+", $address);

	$json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyC4iTicyKUzAuJ1EoxCFHif4BIDnPS9Cuc");
	$json = json_decode($json);

	$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	return ['lat'=>$lat,'lng'=>$long];
}

?>
<?php switch($page['alias']){

	case 'delivery_and_payment': ?>

	<div class="deliveryBlock wrapper">
		<div class="deliveryBlock-title mainTitleInner"><?=$page['name']; ?></div>

		<div class="deliveryBlock-text">
			<?=$page['content']?>
		</div>

		<div class="clientBlock"><img src="/html/img/clients.jpg"></div>
	</div>
		<?php break;

	case 'contacts':

	    $markers = '';
	    foreach($addresses as $k => $address) {
	        $latlng = get_lat_long($address['address']);
	        $latlng_str = \yii\helpers\Json::encode($latlng);
	        $markers .= "var marker_$k = new google.maps.Marker({
              position: $latlng_str,
              map: map,
              title: '{$address['address']}'
            });";
        }

        $this->registerJsFile("https://maps.googleapis.com/maps/api/js?key=AIzaSyC4iTicyKUzAuJ1EoxCFHif4BIDnPS9Cuc&callback=initMap");

        $this->registerJs("
        
          var map;
          function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              center: $latlng_str,
              zoom: 13
            });
            
            $markers
            
          }
        
        ", \frontend\web\View::POS_BEGIN);


	    ?>
		<div class="contactBlock wrapper">
			<div class="contactBlock-title mainTitleInner">контакты</div>
			<div class="locationBlock-text">
				<p>
					<?=$page['content']?>
				</p>
			</div>
			<div class="contactBlock-headGroup">
				<ul class="contactBlock-contactItem contactBlock-contactItem__phone">
                    <?php foreach($phones as $phone){ ?>
					<li class="contactBlock-li">
						<a href="tel:<?=$phone['phone']?>" class="contactBlock-linkBold"><?=$phone['phone']?></a>
					</li>
                    <?php } ?>
				</ul>
				<ul class="contactBlock-contactItem contactBlock-contactItem__address">
			        <?php foreach($addresses as $address){ ?><li class="contactBlock-li"><?=$address['address']?></li><?php } ?>
				</ul>
				<ul class="contactBlock-contactItem contactBlock-contactItem__mail">
			        <?php foreach($emails as $email){ ?>
					<li class="contactBlock-li">
						<a href="mailto:<?=$email['email']?>" class="contactBlock-link"><?=$email['email']?></a>
					</li>
                    <?php } ?>
				</ul>
			</div>


		</div>

		<div id="map"></div>
		<?php break;

	case 'our_offices': ?>

		<div class="locationBlock wrapper">
			<div class="locationBlock-title mainTitleInner">наши шиномонтажи</div>
			<div class="locationBlock-text">
				<p>
					<?=$page['content']?>
				</p>
			</div>

			<div class="contactBlock-squareGroup contactBlock-squareGroup__inner clearfix">
				<?php foreach($offices as $office){ ?>
                <div class="contactBlock-squareItem">
					<img src="/resources/images/<?=$office->image?>" class="contactBlock-bgImg">
					<div class="contactBlock-squareInfo">
						<a href="tel:+380932194243" class="contactBlock-squarePhone"><?=$office->phone?></a>
						<a href="mailto:sicam_km@ukr.net" class="contactBlock-squareMail"><?=$office->email?></a>
						<div class="contactBlock-squareAddress"><?=$office->address?></div>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>

		<?php break;

	default: ?>
		<div class="deliveryBlock wrapper">
			<div class="deliveryBlock-title mainTitleInner"><?=$page['name']; ?></div>

			<div class="deliveryBlock-text">
				<?=$page['content']?>
			</div>
		</div>
		<?php break;
}

