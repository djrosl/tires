<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
	$model->active = true;
	$model->order = \common\models\Slide::find()->count();
}
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php if($model->image){
      echo usni\library\utils\FileUploadUtil::getThumbnailImage($model, 'image', [
		    'thumbWidth' => 1200, 'thumbHeight' => 350
	    ]);
    } ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
