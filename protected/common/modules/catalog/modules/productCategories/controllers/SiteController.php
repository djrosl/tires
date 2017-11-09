<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace productCategories\controllers;

use frontend\business\HomeManager;
use frontend\controllers\BaseController;
use frontend\dto\HomePageDTO;
use productCategories\dto\ProductCategoryListViewDTO;
use productCategories\business\SiteManager;
use usni\UsniAdaptor;
use yii\base\InvalidParamException;
/**
 * SiteController class file.
 * 
 * @package productCategories\controllers
 */
class SiteController extends BaseController
{   
    /**
     * Product lists on the basis of category.
     * @param $id int
     * @return null 
     */
    public function actionView($id)
    {
        $isValid  = SiteManager::getInstance()->isValidCategory($id);
        if($isValid == false)
        {
            throw new InvalidParamException(UsniAdaptor::t('productCategories', "Invalid product category"));
        }
        $listViewDTO    = new ProductCategoryListViewDTO();
        $listViewDTO->setId($id);
        $listViewDTO->setSortingOption(UsniAdaptor::app()->request->get('sort'));
        $listViewDTO->setPageSize(UsniAdaptor::app()->request->get('showItemsPerPage', 18));
        $dataCategoryId = UsniAdaptor::app()->storeManager->selectedStore['data_category_id'];
        $listViewDTO->setDataCategoryId($dataCategoryId);


        $attribute_params = array_filter(UsniAdaptor::app()->request->get(), function($key){
        	return preg_match('/a_\d+/', $key);
        }, ARRAY_FILTER_USE_KEY);

	      $attrs = [];
        if($attribute_params){
	        foreach ( $attribute_params as $key => $param ) {
		        $id = (int)preg_replace('/a_(.*)/','$1', $key);
		        $attrs[$id] = $param;
        	}
        }

	      $listViewDTO->setFilterAttributes($attrs);

        SiteManager::getInstance()->processView($listViewDTO);
        $productCategory = $listViewDTO->getProductCategory();
        if($productCategory['metakeywords'] != null) {
            $this->getView()->registerMetaTag([
                'name' => 'keywords',
                'content' => $productCategory['metakeywords']
            ]);
        }
        if($productCategory['metadescription'] != null) {
            $this->getView()->registerMetaTag([
                'name' => 'description',
                'content' => $productCategory['metadescription']
            ]);
        }

		    $manager     = new HomeManager();
		    $homePageDTO = new HomePageDTO();
		    $manager->setPageData($homePageDTO);

        return $this->render('/front/view', [
        	'listViewDTO' => $listViewDTO,
	        'homePageDTO'=>$homePageDTO

        ]);
    }
}
