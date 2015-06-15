<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $model app\models\MyList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-list-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
