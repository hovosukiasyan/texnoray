<?php echo $this->render('pre_header'); ?>
<div class="wrapper">
    <?= $this->render('header');?>
    <?= $content ?>
    <?php
    if( Yii::$app->controller->action->id != 'index' && Yii::$app->controller->id != 'site'){
        echo \frontend\widgets\brands\BrandsWidget::widget();
    }
    ?>
    <?= $this->render('footer');?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
