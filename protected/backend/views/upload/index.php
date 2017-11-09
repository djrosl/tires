<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 09.10.2017
 * Time: 17:42
 */

$this->title = 'Загрузить прайс-лист';
?>


    <div class="container-fluid">
<br><br><br>
    <?php
echo \yii\helpers\Html::tag('h1', 'Загрузить прайс-лист');


echo \yii\helpers\Html::beginForm('', 'post', ['enctype'=>'multipart/form-data']);



$cols = ["Заголовок","Виробник","Модель","Кількість","Ціна","Зображення","ID"];


?>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="">Файл</label>
        <?=\yii\helpers\Html::input('file', 'price', null, ['class'=>'form-control']);?>
    </div>
    <div class="form-group col-sm-4">
            <label for="">Кодировка файла (если не появились заголовки - сменить на utf-8)</label>
            <select class="form-control" name="encoding" id="">
                <option value="windows-1251" selected>windows-1251</option>
                <option value="utf-8">utf-8</option>
            </select>
    </div>
</div>
<?php echo \yii\helpers\Html::submitButton('Загрузить', ['class'=>'btn btn-success']);

echo \yii\helpers\Html::endForm();

$attributes = \products\dao\ProductAttributeDAO::getAll('en-US');

if($file && $columns) {
	echo \yii\helpers\Html::beginForm(); ?>

	<br><br><br>

<?php echo \yii\helpers\Html::tag('h2', 'Сопоставьте параметры товаров');


 var_dump($columns, $file);


	?>
    <br><br><br>

        <div class="row">
            <?php foreach($cols as $col){ ?>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for=""><?=$col?></label>
                    <select class="form-control" name="<?=$col?>" id="">
                        <option value="">----</option>
		                <?php foreach($columns as $column){
			                echo '<option value="'.$column.'">'.$column.'</option>';

		                } ?>
                    </select>
                </div>
            </div>
            <?php } ?>
        </div>


    <hr>

        <div class="row">
            <?php foreach($attributes as $attribute){ ?>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for=""><?=$attribute['name']?></label>

                        <select class="form-control" name="attributes[<?=$attribute['name']?>]" id="">
                            <option value="">----</option>
				            <?php foreach($columns as $column){
					            echo '<option value="'.$column.'">'.$column.'</option>';

				            } ?>
                        </select>

                    </div>
                </div>
            <?php } ?>
        </div>

    <hr>
        <div class="form-group">
            <label for="">Категория</label>

            <select class="form-control" name="category" id="">
                <option value="4">Шины</option>
                <option value="6">Грузовые шины</option>
                <option value="5">Диски</option>
            </select>

        </div>

        <div class="form-group">
            <label for="">Что делать с товарами?</label>
            <ul>
                <li>Заменить - все существующие товары заменятся на товары из прайса</li>
                <li>Добавить - все товары из прайса добавятся к существующим</li>
                <li>Заместить - система заменит существующие товары на товары из прайса с такими же ID. Остальные товары из прайса будут добавлены</li>
            </ul>

            <select class="form-control" name="doing" id="">
                <option value="0">Заменить</option>
                <option value="1">Добавить</option>
                <option value="2" selected>Заместить</option>

            </select>

               <input type="hidden" name="filename" value="<?=$filename?>">
        </div>


            <div class="text-right" id="submbutton">

		        <?= \yii\helpers\Html::submitButton('Отправить', ['class'=>'btn btn-success']); ?>
            </div>
            <div class="text-right pending">
                <div class="lds-css ng-scope">
<div class="lds-spinner" style="100%;height:100%"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<style type="text/css">@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
.lds-spinner {
  position: relative;
}
.lds-spinner div {
  left: 94px;
  top: 48px;
  position: absolute;
  -webkit-animation: lds-spinner linear 1s infinite;
  animation: lds-spinner linear 1s infinite;
  background: #a0d328;
  width: 12px;
  height: 24px;
  border-radius: 40%;
  -webkit-transform-origin: 6px 52px;
  transform-origin: 6px 52px;
}
.lds-spinner div:nth-child(1) {
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-animation-delay: -0.916666666666667s;
  animation-delay: -0.916666666666667s;
}
.lds-spinner div:nth-child(2) {
  -webkit-transform: rotate(30deg);
  transform: rotate(30deg);
  -webkit-animation-delay: -0.833333333333333s;
  animation-delay: -0.833333333333333s;
}
.lds-spinner div:nth-child(3) {
  -webkit-transform: rotate(60deg);
  transform: rotate(60deg);
  -webkit-animation-delay: -0.75s;
  animation-delay: -0.75s;
}
.lds-spinner div:nth-child(4) {
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
  -webkit-animation-delay: -0.666666666666667s;
  animation-delay: -0.666666666666667s;
}
.lds-spinner div:nth-child(5) {
  -webkit-transform: rotate(120deg);
  transform: rotate(120deg);
  -webkit-animation-delay: -0.583333333333333s;
  animation-delay: -0.583333333333333s;
}
.lds-spinner div:nth-child(6) {
  -webkit-transform: rotate(150deg);
  transform: rotate(150deg);
  -webkit-animation-delay: -0.5s;
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(7) {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
  -webkit-animation-delay: -0.416666666666667s;
  animation-delay: -0.416666666666667s;
}
.lds-spinner div:nth-child(8) {
  -webkit-transform: rotate(210deg);
  transform: rotate(210deg);
  -webkit-animation-delay: -0.333333333333333s;
  animation-delay: -0.333333333333333s;
}
.lds-spinner div:nth-child(9) {
  -webkit-transform: rotate(240deg);
  transform: rotate(240deg);
  -webkit-animation-delay: -0.25s;
  animation-delay: -0.25s;
}
.lds-spinner div:nth-child(10) {
  -webkit-transform: rotate(270deg);
  transform: rotate(270deg);
  -webkit-animation-delay: -0.166666666666667s;
  animation-delay: -0.166666666666667s;
}
.lds-spinner div:nth-child(11) {
  -webkit-transform: rotate(300deg);
  transform: rotate(300deg);
  -webkit-animation-delay: -0.083333333333333s;
  animation-delay: -0.083333333333333s;
}
.lds-spinner div:nth-child(12) {
  -webkit-transform: rotate(330deg);
  transform: rotate(330deg);
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
}
.lds-spinner {
  width: 103px !important;
  height: 103px !important;
  -webkit-transform: translate(-51.5px, -51.5px) scale(0.515) translate(51.5px, 51.5px);
  transform: translate(-51.5px, -51.5px) scale(0.515) translate(51.5px, 51.5px);
}
</style></div>
            </div>

    <br><br><br><br>
	<?php



echo \yii\helpers\Html::endForm();


}
