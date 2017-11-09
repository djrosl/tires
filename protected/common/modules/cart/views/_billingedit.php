<?php
use usni\library\utils\CountryUtil;

/* @var $this \frontend\web\View */
/* @var $form \usni\library\bootstrap\ActiveForm */


$model->firstname = 'firstname';
$model->lastname = 'lastname';
$model->email = 'email@email.com';
$model->mobilephone = '000000000000';
$model->address1 = 'address1';
$model->address2 = 'address2';
$model->city = 'city';
$model->state = 'state';
$model->country = 'UA';
$model->postal_code = '00000';
?>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'firstname')->textInput();?>
        <?= $form->field($model, 'lastname')->textInput();?>
        <?= $form->field($model, 'email')->textInput();?>
        <?= $form->field($model, 'mobilephone')->textInput();?>
        <?= $form->field($model, 'address1')->textInput();?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'address2')->textInput();?>
        <?= $form->field($model, 'city')->textInput();?>
        <?= $form->field($model, 'state')->textInput();?>
        <?= $form->field($model, 'country')->select2input(CountryUtil::getCountries());?>
        <?= $form->field($model, 'postal_code')->textInput();?>
    </div>
</div>

