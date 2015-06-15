<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap;


?>

    <?php
    foreach ($pages as $page): ?>
        <h1><?= $page->header ?></h1><hr>
        <?= Html::encode("{$page->content}") ?><br>

       <img src="<?= $page->img ?>">

        <br>
        <?= $page->author ?><br>
        <?= $page->date ?><hr>
    <?php endforeach; ?>

<?= Html::a('View', ['view',  'id' => $page->id], ['class' => 'btn btn-default']) ?> <br />
<?= LinkPager::widget(['pagination' => $pagination]) ?>



