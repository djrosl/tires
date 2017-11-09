<?php
use usni\UsniAdaptor;
use frontend\widgets\GlobalMenu;

echo GlobalMenu::widget(['inner'=>!empty($this->params['inner']) ? $this->params['inner'] : false]);
