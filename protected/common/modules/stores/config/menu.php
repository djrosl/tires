<?php
use usni\library\utils\MenuUtil;
use usni\UsniAdaptor;

if(UsniAdaptor::app()->user->can('access.stores'))
{
    return [    
                'label'       => MenuUtil::getSidebarMenuIcon('globe') .
                                     MenuUtil::wrapLabel(UsniAdaptor::t('stores', 'Stores')),
                'url'         => ['/stores/default/update?id=1'],
                'itemOptions' => ['class' => 'navblock-header']
            ];
}
return [];

