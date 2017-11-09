<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Testimonials */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
	$model->active = true;
	$model->order = \common\models\Testimonials::find()->count();
}
?>

<div class="testimonials-form">

	<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

	<?php if($model->image){
		echo usni\library\utils\FileUploadUtil::getThumbnailImage($model, 'image', [
			'thumbWidth' => 100
		]);
	} ?>
	<?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
