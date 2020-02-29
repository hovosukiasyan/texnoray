<?php use yii\helpers\Html;?>
<?php use yii\helpers\Url;?>
<!--<div><h1>Каталог</h1></div><div class="article mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="height: auto;padding: 0;" id="loader_cover"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr"><div id="loader"></div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><a href="#" class="mCSB_buttonUp" oncontextmenu="return false;"></a><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div><a href="#" class="mCSB_buttonDown" oncontextmenu="return false;"></a></div></div></div>-->
        <div class="clear"></div>
        <div class="page-content">

            <div class="pr_cat_title"><h1>
                </h1></div>

            <div class="clear"></div>

            <div id="kod-pr-catalog">
                <?php \yii\widgets\Pjax::begin(['enablePushState'=>false]) ?>
                <ul>
                    <?php
                    if (!empty($products)){
                        foreach ($products as $product){

                    ?>
                    <li class="new-pr" data-price="16" data-id="45" data-brand="0" data-new="0" data-act="0" data-inverter="0" data-hit="0">
                        <div class="stock stock-has"></div>
                        <div class="new-img">
                            <?= Html::a('',Url::to('@web/product/product/'.$product['slug'],true))?>
                                <?php
                                echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/prod/' . $product['image']),[''])
                                ?>

                        </div>
                        <div class="new-pr-title">
                            <?= Html::a('',Url::to('@web/product/product/'.$product['slug'],true))?><div style="height:40px;font-weight:bold;margin-bottom: 20px;">
                                    <?= $product['title'] ?>				</div>
                            <div class="new-price">
                                <div class="new-price-block"><span class="price"><?= $product['price'] ?></span>&nbsp;<span class="rub">руб.</span></div>
                                <div class="action-buy"><a href="<?= Url::to('@web/product/product/' . $product['slug'] ) ?>"><span>Купить</span></a></div>
                                <div class="rating"><span>Рейтинг: 4.0</span><span class="star"></span></div>
                                <div class="new-shop action-shop"><a href="javascript:void(0)" onclick="toCart(this)" class="toCart" data-price="16" data-id="45"></a></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </li>
                            <?php
                        }
                    }else{
                       echo "<h1>There are no products of that category</h1>";
                    }

                    ?>
                    <?php echo \yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
                </ul>
                <?php \yii\widgets\Pjax::end() ?>
                <div class="clear"></div>

            </div>
            <div class="clear"></div>
<!--            <ul id="product_pagination" class="pagination">-->
<!--                <li><span class="active">1</span></li><li><a href="http://www.texnoray.ru/products.html/1">2</a> </li><li><a href="http://www.texnoray.ru/products.html/2">3</a> </li><li><a href="http://www.texnoray.ru/products.html/3">4</a> </li><li><a href="http://www.texnoray.ru/products.html/4">5</a> </li>		</ul>-->
<!--            <div class="clear"></div>-->
            <div class="cat_cont">
            </div>
        </div>