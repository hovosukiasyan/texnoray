<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript">
        base_url = '<?= \yii\helpers\Url::to(['/']) ?>';
    </script>
</head>
<body>
<?php $this->beginBody();
Modal::begin([
    'header'=>'<h2>Shopping Cart</h2>',
    'size'=> 'modal-lg',
    'id'=>'cart',
    'footer'=>' <button type="button" class="btn btn-default" data-dismiss="modal">Continue</button>
                <a href="'. Url::to(['cart/view']).'"  class="btn btn-success">Make order</a> 
                <button type="button" class="btn btn-danger" onclick="clearCart()">Clear Cart</button>'
]);
Modal::end();
?>
