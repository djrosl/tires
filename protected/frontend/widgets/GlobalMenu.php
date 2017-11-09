<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace frontend\widgets;

use yii\helpers\ArrayHelper;
use yii\widgets\Menu;
use usni\fontawesome\FA;
use usni\UsniAdaptor;
/**
 * Renders global menu in the front end
 *
 * @package frontend\widgets
 */
class GlobalMenu extends \yii\bootstrap\Widget
{

	public $inner = false;

    /**
     * inheritdoc
     */
    public function run()
    {
	    $this->view->params['inner'] = $this->inner;

        $categoryData   = UsniAdaptor::app()->session->get('globalMenuItems');

        $info = [
        	[
        		'label'=>'Доставка и оплата',
		        'url'=>UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'delivery_and_payment')])
	        ],
	        [
		        'label'=>'Контакты',
		        'url'=>UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'contacts')])
	        ],
	        [
		        'label'=>'Наши шиномонтажи',
		        'url'=>UsniAdaptor::createUrl('cms/site/page', ['alias' => UsniAdaptor::t('cms', 'our_offices')])
	        ]
        ];

        $items          = ArrayHelper::merge($this->createMenuItems($categoryData), $info);

        return Menu::widget([
                                'items'             => $items,
                                'encodeLabels'      => false,
                                'activateParents'   => true,
                                'options'           => ['class' => 'headerNav-list'],
                                'itemOptions'       => ['class'=>'headerNav-li'],
                                'linkTemplate'      => '<a class="headerNav-link '.(!empty($this->view->params['inner']) && $this->view->params['inner'] ? 'headerNav-link__inner' : '').'" href="{url}">{label}</a>',
                                'submenuTemplate'   => '<div class="dropdown-menu"><div class="dropdown-inner"><ul class="list-unstyled">{items}</ul></div></div>'
                           ]);
    }
    
    /**
     * Create menu items.
     * @return array
     */
    public function createMenuItems($categories)
    {
        $items      = [];
        foreach ($categories as $category)
        {
            if($category['displayintopmenu'])
            {
                $url    = $this->resolveUrl($category);
                $label  = $category['name'];
                //Check for sub menu items
                $item = array('label'   => $label,
                             'url'     => $url);
                if(isset($category['hasChildren']) && $category['hasChildren'])
                {
                    $item['label']  .=  "\n" . FA::icon('caret-down');
                    $item['options'] = ['class' => 'dropdown'];
                    //We are getting sub menu items only if item is active
                    $subMenuItems = $this->createMenuItems($category['children']);
                    //$item['active'] = true;
                    $item['items']  = $subMenuItems;
                }
                $items[] = $item;
            }
        }
        return $items;
    }
    
    /**
     * Resolve url for the category
     * @param array $category
     * @return string
     */
    protected function resolveUrl($category)
    {
        if (!empty($category['custom_url']))
        {
            $url = $category['custom_url'];
        }
        else
        {
            $url = UsniAdaptor::createUrl('/catalog/productCategories/site/view', ['id' => $category['id']]);
        }
        return $url;
    }
}