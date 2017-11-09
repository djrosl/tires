<?php
use usni\library\widgets\DetailView;
use usni\UsniAdaptor;
use common\modules\localization\modules\orderstatus\widgets\StatusLabel;

/* @var $detailViewDTO \usni\library\dto\DetailViewDTO */
/* @var $this \usni\library\web\AdminView */

$model              = $detailViewDTO->getModel();
$currencySymbol     = UsniAdaptor::app()->currencyManager->getCurrencySymbol($model['currency_code']);

$widgetParams   = [
                    'detailViewDTO' => $detailViewDTO,
                    'decoratorView' => false,
                    'model'         => $model,
                    'attributes'    => [
                                            'unique_id',
                                            [
                                                'label'      => UsniAdaptor::t('customer', 'Покупатель'),
                                                'attribute'  => 'customer_id',
                                                'value'      => $model['firstname']
                                            ],
	                    [
		                    'label'      => UsniAdaptor::t('customer', 'Email'),
		                    'attribute'  => 'customer_email',
		                    'value'      => $model['email']
	                    ],
	                    [
		                    'label'      => UsniAdaptor::t('customer', 'Телефон'),
		                    'attribute'  => 'customer_phone',
		                    'value'      => $model['mobilephone']
	                    ],
                                            [
                                                'attribute' => 'status', 
                                                'value'     => StatusLabel::widget(['model' => $model]), 
                                                'format'    => 'raw' ,
	                                            'label'=>'Статус'
                                            ],

                                        ]
                    ];
echo DetailView::widget($widgetParams);

