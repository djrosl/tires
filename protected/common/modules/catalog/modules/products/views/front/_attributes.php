<?php
if(!empty($data)) {

    if($manufacturer){
        $manufacturer = \common\modules\manufacturer\models\Manufacturer::findOne(['id'=>$manufacturer]);
    }


    foreach($data as $attributeGroupId => $attributeGroupData) {
        foreach($attributeGroupData as $attributeGroupName => $attributesData) {

	        $key = array_search('Сезон', array_column($attributesData, 'name'));
	        $season = $attributesData[$key];
	        unset($attributesData[$key]);

	        switch($season['attribute_value']){
              case 'зимняя':
	              $classes = 'seasonBlock__winter';
                break;
              case 'літня':
	              $classes = 'seasonBlock__summer';
                break;
              case 'всесезонна':
	              $classes = 'seasonBlock__winter seasonBlock__summer';
                break;
              default:
	              $classes = '';
                break;
            }
	        ?>


        <?php if($classes){ ?><div class="seasonBlock seasonBlock__inner <?=$classes?>"><?=$season['attribute_value']?></div><?php } ?>
        <ul class="cardInner-table">
            <?php if($manufacturer){ ?>
            <li class="cardInner-li clearfix">
                <span class="cardInner-liTitle">Производитель</span>
                <span class="cardItem-liVal"><?php echo $manufacturer->name;?></span>
            </li>
            <?php } ?>
          <?php foreach($attributesData as $attributeData) { ?>
                 <li class="cardInner-li clearfix">
                     <span class="cardInner-liTitle"><?php echo $attributeData['name'];?></span>
                     <span class="cardItem-liVal"><?php echo $attributeData['attribute_value'];?></span>
                 </li>
          <?php } ?>
        </ul>
      <?php }
    }
}?>
