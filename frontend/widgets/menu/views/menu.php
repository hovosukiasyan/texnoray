<ul class="main-menu">
    <li><a href="<?= \yii\helpers\Url::to('@web/catalog') ?>">Каталог
        </a></li>
    <?php
        foreach ($articles as $article){
            ?>
            <li><a href="<?= \yii\helpers\Url::to('@web/'.$article['slug']) ?>"><?= $article['title'] ?></a></li>
            <?php
        }
    ?>
    <li><a href="<?= \yii\helpers\Url::to('@web/site/contact') ?>">Контакты</a></li>

</ul>





<?php
//$menuItems = [
//    ['label' => 'Home', 'url' => ['/site/index']],
//    ['label' => 'About', 'url' => ['/site/about']],
//    ['label' => 'Contact', 'url' => ['/site/contact']],
//];

//echo \yii\bootstrap\Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-right'],
//    'items' => $menuItems,
//]);