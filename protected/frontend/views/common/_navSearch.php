<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\fontawesome\FA;
use usni\UsniAdaptor;


?>

<form id="navbarsearchformview" action="<?php echo UsniAdaptor::createUrl('site/default/search');?>" method="get" class="searchForm searchForm__rightAbsolute">
    <input id="navbarsearchform-keyword" type="text" class="searchForm-area <?=!empty($this->params['inner']) && $this->params['inner'] ?  'searchForm-area__inner' : ''?>" name="SearchForm[keyword]" placeholder="быстрый поиск">
    <button class="searchForm-button <?=!empty($this->params['inner']) && $this->params['inner'] ?  'searchForm-button__inner' : ''?>" name="navsearch"></button>
</form>
