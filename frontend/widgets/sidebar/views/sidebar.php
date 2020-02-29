<?php
use yii\helpers\Url;
?>
<div class="sidebar">

    <fieldset class="filter-list__item selected" style="margin-bottom:20px;">
        <form action="" method="post">
            <input type="hidden" value="filter" name="filter">
            <h3>Фильтр товаров</h3>
            <div class="filter-list__inner">
                <h5>Цена, руб</h5>
                <div class="horizontal-slider">
                    <div class="formCost">
                        <div class="formCost__left">
                            <label>от</label>
                            <input type="text" name="min_price" id="min_price" class="min-cost" value="0">
                        </div>
                        <div class="formCost__right">
                            <label>до</label>
                            <input type="text" name="max_price" id="max_price" class="max-cost" value="30000000">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div id="price-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
                </div>
            </div>

            <div class="filter-list__inner">
                <h3>Производитель</h3>
                <ul class="filter-list__inner__brands">
                    <?php
                    if (!empty($brands)){
                        foreach ($brands as $brand){
                            ?>
                    <li class="first-child">
                        <input name="pr_brend[]" value="<?= $brand['id']?>" type="checkbox">
                        <a href="<?=Url::to('@web/product/brand/'.$brand['slug'])?>"><?= $brand['title'] ?></a>
                    </li>
                    <?php
                        }
                            }else{
                                echo 'brand is empty';
                                }

        ?>
                </ul>
            </div>

            <div class="filter-div">
                <input type="button" id="filter-products" value="Фильтр">
            </div>
        </form>
    </fieldset>
</div>