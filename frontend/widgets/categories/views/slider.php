<div class="category-slider flexslider">
    <ul class="slides">
        <?php  if (!empty($categories)){
            foreach ($categories as $category){
                ?>
                <li >
                    <div class="slider-cat-img">


                        <?php echo \yii\helpers\Html::img(\yii\helpers\Url::to('@web/images/categories/' . $category['image']),['']) ?>
                        <div class="slider-cat-title">
                            <h4><?= \yii\helpers\Html::a($category['title'],\yii\helpers\Url::to('@web/category/'.$category['slug'],true))?>
                        </div>

                    </div>
                    <div class="cat-shadow"></div>
                </li>
                <?php
            }
        }else{
            echo 'category is empty';
        }

        ?>
    </ul>
</div>