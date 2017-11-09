<?php

namespace backend\controllers;

use common\modules\manufacturer\models\Manufacturer;
use ForceUTF8\Encoding;
use moonland\phpexcel\Excel;
use products\dao\ProductAttributeDAO;
use products\models\Product;
use products\models\ProductAttributeMapping;
use usni\library\utils\FileUploadUtil;
use usni\UsniAdaptor;
use Yii;
use common\models\Slide;
use common\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class UploadController extends Controller
{

    public function actionIndex(){

	    ini_set('upload_max_filesize', '100M');
	    ini_set('post_max_size', '100M');
	    ini_set('max_input_time', 3000);
	    ini_set('max_execution_time', 3000);

    	$file = [];
    	$columns = [];
    	$filename = false;

    	if(\Yii::$app->request->post()){
		    if(\Yii::$app->request->post('Заголовок')){

//		    	$command = 'cd /srv/tires && ./yii parse/parse "'.\Yii::$app->request->post('filename').'" \''.json_encode(\Yii::$app->request->post()).'\'';
//		    	exec($command, $output);
//		    	print_r($output);die;

			    return $this->parse(\Yii::$app->request->post('filename'), \Yii::$app->request->post());
		    }
    		$file = UploadedFile::getInstanceByName('price');
		    $path = \Yii::getAlias('@webroot/price/'.$file->name);

		    //$contents = iconv('windows-1251', 'utf-8', file_get_contents($file->tempName));
		    $file->saveAs($path);

		    //file_put_contents($path, $contents);

		    if(\Yii::$app->request->post('encoding', 'windows-1251') === 'windows-1251') {
			    file_put_contents($path,
				    str_replace(';', ',',
					    str_replace(',', '.',
						    iconv('windows-1251', 'utf-8',
							    file_get_contents($path)))));
		    } else {
			    file_put_contents($path,
				    str_replace(';', ',',
					    str_replace(',', '.',
						    file_get_contents($path))));
		    }

		    $filename = $file->name;
		    $data = Excel::import($path);

		    $columns = array_keys($data[0]);
	    }

    	return $this->render('index', compact('file', 'columns', 'filename'));
    }

	public function parse($filename = 'tires.xlsx', $postdata, $placeholder = 'sample2.png'){
		$file = \Yii::getAlias('@webroot/price/'.$filename);

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
				$id = strlen($item[$postdata['ID']]) > 16 ? substr($item[$postdata['ID']], 0, 16) : $item[$postdata['ID']];
				$model = Product::findOne(['sku'=>$id]);
			}

			if(!$model){
				$model = new Product(['scenario'=>'create']);
			}


			$model->name = $item[$postdata['Заголовок']];
			$model->model = $item[$postdata['Модель']];
			$model->quantity = (int)$item[$postdata['Кількість']];
			$model->price = (float)$item[$postdata['Ціна']];
			$model->sku = $item[$postdata['ID']];

			$model->type = 1;
			$model->alias = (string)$model->sku;
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

				file_put_contents(\Yii::getAlias('@resources/images/').$model->image, fopen($item[$postdata['Зображення']], 'r'));
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

			sleep(1);

			//echo $model->name . "added ($key/$count) \n";
		}



		echo 'Добавлено ($key/$count). <a href="/backend/">Вернуться в админ панель</a>';

		return 1;
	}

	function _detectFileEncoding($filepath) {
		// VALIDATE $filepath !!!
		$output = array();
		exec('file -i ' . $filepath, $output);
		if (isset($output[0])){
			$ex = explode('charset=', $output[0]);
			return isset($ex[1]) ? $ex[1] : null;
		}
		return null;
	}


}
