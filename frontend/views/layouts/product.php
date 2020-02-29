<?php
echo $this->render('pre_header'); ?>
<div class="wrapper">
    <?= $this->render('header');?>
    <div class="content page-content">
        <?= \frontend\widgets\sidebar\SidebarWidget::widget();  ?>
        <div style="width: 77%;float: right;margin-top:30px">
            <?= $content ?>
        </div>
        <div class="clear"></div>
    </div>
    <?= $this->render('footer');?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
