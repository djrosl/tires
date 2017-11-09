<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 28.09.2017
 * Time: 18:04
 */

namespace console\controllers;


use common\modules\manufacturer\models\Manufacturer;
use moonland\phpexcel\Excel;
use products\dao\ProductAttributeDAO;
use products\models\Product;
use products\models\ProductAttribute;
use products\models\ProductAttributeMapping;
use yii\console\Controller;

class ParseController extends Controller {


	public function actionIndex($filename = 'tires.xlsx', $category = 4, $placeholder = 'sample2.png'){
		$file = \Yii::getAlias('@webroot/backend/price/'.$filename);

		$attributes = ProductAttributeDAO::getAll('en-US');

		$data = Excel::import($file);

		$count = count($data);

		foreach ($data as $key => $item) {

			$manufacturer = Manufacturer::findOne(['name'=>$item['Виробник']]);

			if(!$manufacturer){
				$manufacturer = new Manufacturer(['scenario'=>'create']);
				$manufacturer->name = $item['Виробник'];
				$manufacturer->status = 1;
				$manufacturer->save();
			}

			$model = new Product(['scenario'=>'create']);
			$model->name = $item['Заголовок'];
			$model->model = $item['Модель'];
			$model->quantity = $item['Кількість'];
			$model->price = $item['Ціна'];
			$model->sku = $item['ID'];

			$model->type = 1;
			$model->alias = $model->sku;
			$model->categories = $category;
			$model->status = 1;
			$model->subtract_stock = 1;
			$model->stock_status = 1;
			$model->requires_shipping = 0;
			$model->is_featured = 0;

			$model->manufacturer = $manufacturer->id;

			if($item['Зображення 1']){
				$arr = explode('/', $item['Зображення 1']);
				$model->image = end($arr);
				file_put_contents(\Yii::getAlias('@webroot/resources/images/').$model->image, fopen($item['Зображення 1'], 'r'));
			} else {
				$model->image = $placeholder;
			}

			if(!$model->save()){
				var_dump($model->errors);
			}

			foreach ($attributes as $attribute) {
				if(empty($item[$attribute['name']])) continue;
				//echo $attribute['name']."({$attribute['id']})".': '.$item[$attribute['name']]."\n";
				$attr = new ProductAttributeMapping(['scenario'=>'create']);
				$attr->product_id = $model->id;
				$attr->attribute_id = $attribute['id'];
				$attr->attribute_value = $item[$attribute['name']];
				$attr->save();

			}

			echo $model->name . "added ($key/$count) \n";
		}

		return 1;
	}


	public function actionParse($filename = 'tires.xlsx', $postdata, $placeholder = 'sample2.png'){

		$postdata = json_decode($postdata, true);

		$file = \Yii::getAlias('@webroot/backend/price/'.$filename);

		$attributes = ProductAttributeDAO::getAll('en-US');

		$data = Excel::import($file);

		$count = count($data);

		if($postdata['doing'] == 0) {
			Product::deleteAll();
		}

		foreach ($data as $key => $item) {

			$manufacturer = Manufacturer::findOne(['name'=>$item[$postdata['Виробник']]]);

			if(!$manufacturer){
				$manufacturer = new Manufacturer(['scenario'=>'create']);
				$manufacturer->name = $item[$postdata['Виробник']];
				$manufacturer->status = 1;
				$manufacturer->save();
			}

			$model = null;

			if($postdata['doing'] == 2) {
				$model = Product::findOne(['sku'=>substr($item[$postdata['ID']], 0, 16)]);

				//var_dump(substr($item[$postdata['ID']], 0, 14));continue;
			}

			if(!$model){
				$model = new Product(['scenario'=>'create']);
			}


			$model->name = $item[$postdata['Заголовок']];
			$model->model = $item[$postdata['Модель']];
			$model->quantity = $item[$postdata['Кількість']];
			$model->price = (float)$item[$postdata['Ціна']];
			$model->sku = (string)$item[$postdata['ID']];

			$model->type = 1;
			$model->alias = $model->sku;
			$model->categories = $postdata['category'];
			$model->status = 1;
			$model->subtract_stock = 1;
			$model->stock_status = 1;
			$model->requires_shipping = 0;
			$model->is_featured = 0;

			$model->manufacturer = $manufacturer->id;

			if($item[$postdata['Зображення']] && file_exists($item[$postdata['Зображення']])){
				$arr = explode('/', $item[$postdata['Зображення']]);
				$model->image = end($arr);

				file_put_contents(\Yii::getAlias('@webroot/resources/images/').$model->image, fopen($item[$postdata['Зображення']], 'r'));
			} else {
				$model->image = $postdata['category'] == 5 ? "wheel.png" : $placeholder;
			}

			if(!$model->save()){
				var_dump($model->errors);
			}

			foreach ($attributes as $attribute) {
				if(!$postdata['attributes'][$attribute['name']] || empty($item[$attribute['name']])) continue;

				$attr = null;

				if($postdata['doing'] == 2) {
					$attr = ProductAttributeMapping::findOne(['product_id'=>$model->id, 'attribute_id'=>$attribute['id']]);
				}

				if(!$attr){
					$attr = new ProductAttributeMapping(['scenario'=>'create']);
				}

				$attr->product_id = $model->id;
				$attr->attribute_id = $attribute['id'];
				$attr->attribute_value = $item[$postdata['attributes'][$attribute['name']]];
				$attr->save();
			}

			//sleep(2);

			return $model->name . "added ($key/$count) \n";
		}



		echo 'Добавлено ($key/$count). <a href="/backend/">Вернуться в админ панель</a>';

		return 1;
	}

}