<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 01.10.2017
 * Time: 15:44
 */

namespace frontend\widgets;


use products\dao\ProductAttributeDAO;
use products\models\ProductAttributeMapping;
use usni\UsniAdaptor;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class FilterFrontWidget extends Widget {

	public $type = '_frontfilter';

	public function run(){

		$attributes = array_map(function($attr){

			$values = ProductAttributeMapping::find()->where(['attribute_id'=>$attr['id']])->select(['attribute_value'])->distinct()->asArray()->all();

			$out = [
				'id'=>$attr['id'],
				'name'=>$attr['name'],
				'values'=>ArrayHelper::getColumn($values, 'attribute_value')
			];

			sort($out['values']);

			return $out;
		}, array_filter(ProductAttributeDAO::getAll('en-US'), function($attr){

			return in_array($attr['name'], ['Ширина', "Профіль", "Діаметр", "Сезон"]);
		}));

		$disk_attributes = array_map(function($attr){

			$values = ProductAttributeMapping::find()->where(['attribute_id'=>$attr['id']])->select(['attribute_value'])->distinct()->asArray()->all();

			$out = [
				'id'=>$attr['id'],
				'name'=>$attr['name'],
				'values'=>ArrayHelper::getColumn($values, 'attribute_value')
			];

			sort($out['values']);

			return $out;
		}, array_filter(ProductAttributeDAO::getAll('en-US'), function($attr){

			return in_array($attr['name'], ['Діаметр', "Ширина", 'PCD1', 'PCD2', "ET", 'DIA']);
		}));

		$attribute_params = array_filter(UsniAdaptor::app()->request->get(), function($key){
			return preg_match('/a_\d+/', $key);
		}, ARRAY_FILTER_USE_KEY);

		$values = [];
		if($attribute_params){
			foreach ( $attribute_params as $key => $param ) {
				$id = (int)preg_replace('/a_(.*)/','$1', $key);
				$values[$id] = $param;
			}
		}

		$type  = $this->type;

		$cat_id = UsniAdaptor::app()->request->get('id', 4);

		return $this->render('@frontend/views/common/_frontfilter', compact('attributes', 'values', 'type', 'disk_attributes', 'cat_id'));
	}

}