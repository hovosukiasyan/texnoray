<div class="header">
    <div class="header-top">
        <div class="container">
            <?php
            echo \frontend\widgets\menu\MenuWidget::widget();
            ?>
            <div class="clear"></div>
        </div>
    </div>
    <div class="grey-sep" style="height:5px"></div>
    <div class="header-body">
        <div class="container">
            <div class="logo"><a href="<?= \yii\helpers\Url::to('@web') ?>"></a></div>
            <div class="header-center">
                <div class="top-info"></div>
                <div class="lenta">
                    <div class="star-left star"></div>
                    <span>Лидер по качеству</span>
                    <div class="star-right star"></div>
                </div>
                <div class="phone"><span class="phone-icon"></span><span class="number">+7 (495) 220 72 87 </span></div>
            </div>
            <div class="header-right">
                <div class="connect"><div class="connect-inner" data-toggle="modal" data-target="#rukavodstvoModal"><a href="javascript:void(0)"></a></div></div><div data-toggle="modal" data-target="#rukavodstvoModal"><a href="javascript:void(0)">СВЯЗЬ С РУКОВОДСТВОМ</a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="header-bottom">
        <div class="container">
            <div class="category-title">
                <div class="big-title">Товарные категории</div>
                <div class="title-bot"></div>
            </div>

            <div class="bottom-menu">
                <ul class="menu-bottom">
                    <li>
                        <div class="callback-icon" data-toggle="modal" data-target="#contactModal"><a href="javascript:void(0)"></a></div>
                        <div class="icon-title" data-toggle="modal" data-target="#contactModal"><a href="javascript:void(0)">Обратный звонок</a></div>
                    </li>
                    <li>
                        <div class="persent-icon"><a href="<?= \yii\helpers\Url::to('@web/sales') ?>"></a></div>
                        <div class="icon-title"><a href="<?= \yii\helpers\Url::to('@web/sales') ?>">акция</a></div>
                    </li>
                    <li>
                        <div class="contact-icon"><a href="<?= \yii\helpers\Url::to('@web/site/contact') ?>"></a></div>
                        <div class="icon-title"><a href="<?= \yii\helpers\Url::to('@web/site/contact') ?>">обратная связь</a></div>
                    </li>
                    <li>
                        <div class="shop-icon"><a href="#" onclick=" return getCard()"></a></div>
                        <div class="icon-title"><a href="#" onclick=" return getCard()">корзина</a></div>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="container">
        <?= \frontend\widgets\categories\CategoryWidget::widget(['tpl'=>'categories']) ?>
    <div class="slider-block">
        <div class="slider">
            <div class="garanty"><span>10</span><span class="last-child"> лет <br>в России</span></div>

            <?= \frontend\widgets\slider\SliderWidget::widget();?>
        </div>
    </div>
    <div class="clear"></div>
    <?= \frontend\widgets\categories\CategoryWidget::widget();?>
</div>