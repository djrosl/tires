<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 28.09.2017
 * Time: 18:04
 */

namespace console\controllers;


use products\models\ProductAttribute;
use Stichoza\GoogleTranslate\TranslateClient;
use yii\console\Controller;

class TranslateController extends Controller {


	public function actionIndex(){


		$path = '/Users/macbook/Documents/mamp/tires/messages/ru';
		$files = array_diff(scandir($path), array('.', '..'));

		foreach($files as $file){
			$arr = require '/Users/macbook/Documents/mamp/tires/messages/ru/'.$file;
			foreach($arr as $key => $item){
				if(!$item){
					$arr[$key] = TranslateClient::translate('en', 'ru', $key);
				}
			}



			$content = '<?php return ';
			$content .= var_export($arr, true);
			$content .= ';';

			$writed = file_put_contents('/Users/macbook/Documents/mamp/tires/messages/ru/'.$file, $content);

			echo $file.': '.$writed;
		}



		//echo TranslateClient::translate('en', 'ru', 'Hello again');

		return 1;
	}

}