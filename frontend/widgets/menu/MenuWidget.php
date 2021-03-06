<?php
namespace frontend\widgets\menu;

use common\models\Articles;

class MenuWidget extends \yii\base\Widget
{
    public $type = 'header';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        // TODO get menu items dynamic from db and pass to view
        $articles = Articles::find()->asArray()->all();
        return $this->render('menu',['articles'=>$articles]);
    }
}