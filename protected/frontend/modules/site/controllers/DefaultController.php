<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace frontend\modules\site\controllers;

use common\models\Slide;
use common\models\Testimonials;
use common\modules\stores\business\ConfigManager;
use frontend\controllers\BaseController;
use usni\library\modules\notification\models\Notification;
use usni\UsniAdaptor;
use frontend\models\SearchForm;
use usni\library\utils\FlashUtil;
use frontend\dto\HomePageDTO;
use frontend\business\HomeManager;
use productCategories\dto\ProductCategoryListViewDTO;
use productCategories\business\SiteManager;
use productCategories\models\ProductCategory;
use frontend\business\SearchManager;
use usni\library\utils\ArrayUtil;
use frontend\modules\site\business\Manager;
use usni\library\dto\FormDTO;
use yii\base\InvalidParamException;
/**
 * DefaultController class file
 * 
 * @package frontend\modules\site\controllers
 */
class DefaultController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * Renders home page.
     * @return string the rendering result.
     */
    public function actionIndex()
    {
        $manager     = new HomeManager();
        $homePageDTO = new HomePageDTO();
        $manager->setPageData($homePageDTO);

        $slides = Slide::find()->where(['active'=>1])->orderBy('order ASC')->all();
	      $testimonials = Testimonials::find()->where(['active'=>1])->orderBy('order ASC')->all();

        return $this->render('/home', [
        	'homePageDTO' => $homePageDTO,
          'slides'=>$slides,
	        'testimonials'=>$testimonials,
        ]);
    }

    /**
     * Render Search.
     * @return string
     */
    public function actionSearch()
    {
        $manager        = SiteManager::getInstance();
        $model          = new SearchForm();
        $listViewDTO    = new ProductCategoryListViewDTO();
        $listViewDTO->setSearchModel($model);
        $dataCategoryId = UsniAdaptor::app()->storeManager->selectedStore['data_category_id'];
        $listViewDTO->setDataCategoryId($dataCategoryId);
        $queryParams    = UsniAdaptor::app()->getRequest()->getQueryParams();
        if($queryParams != null)
        {
            $model->load($queryParams);
            if($model->validate())
            {
                $listViewDTO->setSortingOption(UsniAdaptor::app()->request->get('sort'));
                $listViewDTO->setPageSize(UsniAdaptor::app()->request->get('showItemsPerPage'));        
            }
            else
            {
                throw new InvalidParamException(UsniAdaptor::t('application', 'Invalid search param'));
            }
        }
        $dp             = SearchManager::getInstance()->getDataProvider($listViewDTO);
        $listViewDTO->setDataprovider($dp);
        $catOptions     = $manager->getMultiLevelSelectOptions(new ProductCategory(), false);
        $listViewDTO->setCategoryList($catOptions);


		    $manager     = new HomeManager();
		    $homePageDTO = new HomePageDTO();
		    $manager->setPageData($homePageDTO);

        return $this->render('//common/searchview', ['listViewDTO' => $listViewDTO, 'homePageDTO' => $homePageDTO]);
    }
    
    /**
     * Contact us action
     * @return string
     */
    public function actionContactUs()
    {
        $postData   = ArrayUtil::getValue($_POST, 'ContactForm');
        $manager    = new Manager();
        $formDTO    = new FormDTO();
        $formDTO->setPostData($postData);
        $manager->processContactUs($formDTO);
        if($formDTO->getIsTransactionSuccess() === true)
        {
            $message = UsniAdaptor::t('applicationflash', 'Thank you for contacting us. We would revert back to you within 24 hours.');
            FlashUtil::setMessage('success', $message);
            $this->refresh();
        }
        elseif($formDTO->getIsTransactionSuccess() === false)
        {
            FlashUtil::setMessage('error', UsniAdaptor::t('applicationflash', 'There is an error sending email'));
            return $this->refresh();
        }
        else
        {
            return $this->render('/contactus', ['formDTO' => $formDTO]); 
        }
    }
    
    /**
     * Site maintenance.
     * @return string
     */
    public function actionMaintenance()
    {
        $customMessage = UsniAdaptor::app()->configManager->getValue('application', 'customMaintenanceModeMessage');
        return $this->render('/maintenance', ['customMessage' => $customMessage]);
    }
    
    /**
     * Error action
     * @return string
     */
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        if ($exception !== null) 
        {
            return $this->render('/error', ['exception' => $exception, 'handler' => \Yii::$app->errorHandler]);
        }
    }

    public function actionCallback(){
    	$name = UsniAdaptor::app()->request->post('name', '');
	    $phone = UsniAdaptor::app()->request->post('phone', '');

//	    $fromAddress        = ['noreply@proskurivtires.km.ua'=>'Проскурів шина'];
//
//	    $mailer             = UsniAdaptor::app()->mailer;
//	    $mailer->setTransport(['class'         => 'Swift_SendmailTransport']);
//	    $message            = $mailer->compose('@frontend/views/mail/callback', compact('name', 'phone'));
//
//	    $message->setFrom($fromAddress)
//	            ->setTo(ConfigManager::getInstance()->getLocalValue('email'));
//
//	    $isSent             = $message->setSubject('Заявка на обратный звонок')->send();
			$date = date('d.m.Y H:i:s');
	    $content = "Пользователь отправил заявку на обратный звонок ($date)\n
Имя: $name\n
Телефон:  $phone\n";

	    $isSent = mail(ConfigManager::getInstance()->getLocalValue('email'), 'Заявка на обратный звонок', $content);

	    return $isSent;
    }

}