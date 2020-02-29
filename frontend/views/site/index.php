<?php use yii\helpers\Url; ?>
<div class="clear"></div>
<div class="action-block">
    <div class="block-title">
        <span>Акция</span>
    </div>
        <?php

        if (!empty($sale)){
            foreach ($sale as $sal){
                ?>
                <div class="action-pr">
                    <div class="action-mark"></div>
                    <div class="action-img">
                        <span class="helper"></span>
                        <a href="<?= Url::to(['/product/product','slug'=>$sal['slug']])?>">
                            <?php
                            echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/prod/' . $sal['image']),[''])
                            ?>

                        </a>
                    </div>
                    <div class="action-price">
                        <div class="action-shop"><a href="javascript:void(0)" onclick="toCart(this)" class="toCart" data-price="37250" data-id="57"></a></div>
                        <div class="price-block"><div><?= $sal['price'] ?> &nbsp;<span class="rub">руб.</span></div><div class="action-buy"><a href="<?= Url::to(['/cart/add','id'=>$sal['id']])?>" data-id="<?= $sal['id']?>" class="add"><span>Купить</span></a></div></div>
                    </div>
                    <div class="clear"></div>
                    <div class="action-pr-title"><?= $sal['title'] ?></div>
                </div>
            <?php
            }
        }else{
            echo 'sale is empty';
            }

        ?>
    <div class="clear"></div>
</div>

<div class="right-content-block">
    <div class="new-block">
        <div class="block-title">
           <span>Новинки</span>
        </div>
        <?php  if (!empty($new)){
            foreach ($new as $nw){
                ?>
        <div class="new-pr">
            <div class="new-mark action-mark"></div>
            <div class="new-img">
                <div class="inverter"></div>
                <a href="<?= Url::to(['/product/product','slug'=>$nw['slug']])?>">
                    <?php
                    echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/prod/' . $nw['image']),[''])
                    ?>
                </a>
            </div>
            <div class="new-pr-title">

                    <div style="height:40px;font-weight:bold;margin-bottom: 20px;"><?= $nw['title']?></div>
                <div class="new-price">
                    <div class="new-price-block"><?= $nw['price'] ?> &nbsp;<span class="rub">руб.</span></div>
                    <div class="action-buy"><a href="<?= Url::to(['/cart/add','id'=>$nw['id']])?>" data-id="<?= $nw['id']?>" class="add"><span >Купить</span></a></div>
                    <div class="new-shop action-shop"><a href="javascript:void(0)" onclick="toCart(this)" class="toCart" data-price="24850" data-id="49"></a></div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <?php
        }
            }else{
                echo 'new is empty';
            }

        ?>
        <div class="clear"></div>
    </div>
    <div class="new-block">
        <div class="block-title">
           <span>Распродажа</span>
        </div>
        <?php  if (!empty($hit)){
        foreach ($hit as $ht){
        ?>
        <div class="new-pr">
            <div class="hit-mark action-mark"></div>
            <div class="new-img">
                <a href="<?= Url::to(['/product/product','slug'=>$ht['slug']])?>">
                    <?php
                    echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/prod/' . $ht['image']),[''])
                    ?>
                </a>
            </div>
            <div class="new-pr-title">

                    <div style="height:40px;font-weight:bold;margin-bottom: 20px;"><?= $ht['title'] ?></div>
                <div class="new-price">
                    <div class="new-price-block"><?= $ht['price'] ?>&nbsp;<span class="rub">руб.</span></div>
                    <div class="action-buy"><a href="<?= Url::to(['/cart/add','id'=>$ht['id']])?>" data-id="<?= $ht['id']?>" class="add"><span >Купить</span></a></div>
                    <div class="new-shop action-shop"><a href="javascript:void(0)" onclick="toCart(this)" class="toCart" data-price="20900" data-id="34"></a></div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
            <?php
        }
        }else{
            echo 'hit is empty';
        }

        ?>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
</div>
<div class="clear"></div>
<?php echo \frontend\widgets\brands\BrandsWidget::widget();?>
<div class="white">
    <div class="container">
        <h1 style="text-align: center;"><a title="Интернет магазин кондиционеров в Москве" href="http://www.texnoray.ru/"><?=$articles['title']?></a></h1>
        <?= $articles['content'];?>
    </div>
</div>
<div class="clear"></div>