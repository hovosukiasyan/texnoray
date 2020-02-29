<?php use yii\bootstrap\Modal;?>
<?php use yii\helpers\Url; ?>


<div class="white" style="margin-bottom: 20px;">
    <div class="container">
        <div class="content page-content">
            <div style="width:100%">
                <div class="column">
                    <div class="clear"></div>
                    <?= $product['description'] ?>
                    <div class="pr-info-img col-md-6">

                            <?php
                            echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/prod/' . $product['image']),[''])
                            ?>

                        <h1 style="font-size: 24px;margin-top: 0px;"><?= $product['title'] ?></h1>
                        <h4 style="color:#000;"><?= $product['code'] ?></h4>
                        <div style="top: -35px;" class="stock stock-has"></div>
                        <div style="text-align: center;">
                            <div class="to-shop" style="width:200px;display:inline-block" id="addToCart" data-price="37250"><a href="<?= Url::to(['/cart/add','id'=>$product['id']])?>" class="dom-pr-but pr-buy green_but add"  data-id="<?= $product['id']?>"><span style="display: inline-block;background-color: #096397; padding: 10px;color: white;margin-bottom: 20px;">Добавить в корзину</span> <span class="new-shop action-shop"></span></a></div>

                            <div class="clear"></div>
                            <div class="single-pr-price-block" style="    font-size: 18px;">
                                <div class="single-pr-price">Стоимость :
                                    <?php
                                    if (!empty($product['discount'])){
                                        ?>
                                        <span style="text-decoration:line-through;color:red;    font-size: 18px;"><?= $product['price'] ?>
                                            руб.</span>
                                        <span style="color:red;font-size: 18px;"><?= $product['price']-( ($product['price']*$product['discount'] )/100) ?> руб.</span>
                                        <?php
                                    }else{
                                        ?>
                                        <span style="color:red"><?= $product['price'] ?></span><span> руб.</span>
                                        <?php
                                    }
                                    ?></div>
                            </div>
                        </div>


                        <?php
                            if (!empty($product['discount'])) {
                                ?>
                                <h2 style="color:red;font-size: 18px;text-align:center">Акция!!! При покупке скидка на
                                    установку - <?= $product['discount'] ?>%</h2>


                                <?php
                            }
                        ?>
                        <br>


                </div>
                					</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
