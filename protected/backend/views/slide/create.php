<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = Yii::t('app', 'Create Slide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
