<div class="categoy-list">
    <ul>
        <?php
        if (!empty($categories)) {
            foreach ($categories as $category) {
                ?>
                <li>
                    <?= \yii\helpers\Html::a($category['title'],\yii\helpers\Url::to('@web/category/'.$category['slug'],true))?>
                </li>
                <?php
            }
        }else{
            echo 'category is empty';
        }
        ?>
    </ul>
</div>