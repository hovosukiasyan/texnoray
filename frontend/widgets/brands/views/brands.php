<?php
  use  yii\helpers\Html;
  use yii\helpers\Url;
?>

<div class="brand-slider flexslider">
    <ul class="slides">
        <?php  if (!empty($brands)){
        foreach ($brands as $brand){
        ?>
        <li >
            <div class="brand-item">
                <span class="helper"></span>
                <a href="<?=Url::to('@web/product/brand/'.$brand['slug'])?>"><?= Html::img('@web/images/brands/'.$brand['image'])?></a>
            </div>
            <div class="brand-shadow"></div>
        </li>
            <?php
        }
        }else{
            echo 'brand is empty';
        }

        ?>
    </ul>
</div>