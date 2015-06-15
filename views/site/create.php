<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MyList */

$this->title = 'Create My List';

?>
<div class="my-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
