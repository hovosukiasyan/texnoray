<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property double $price
 * @property double $discount
 * @property string $title
 * @property string $image
 * @property string $slug
 * @property string $description
 * @property string $code
 * @property string $is_new
 * @property string $is_sale
 * @property string $is_hit
 * @property int $brand_id
 * @property int $category_id
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'from_attribute' => 'title',
                'to_attribute' => 'slug',
                'translit' => true
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'discount', 'title', 'description', 'code', 'is_new', 'is_sale', 'is_hit', 'brand_id', 'category_id'], 'required'],
            [['price', 'discount'], 'number'],
            [['description', 'is_new', 'is_sale', 'is_hit'], 'string'],
            [['brand_id', 'category_id'], 'integer'],
            [['title', 'image', 'slug', 'code'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price' => Yii::t('app', 'Price'),
            'discount' => Yii::t('app', 'Discount'),
            'title' => Yii::t('app', 'Title'),
            'image' => Yii::t('app', 'Image'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'code' => Yii::t('app', 'Code'),
            'is_new' => Yii::t('app', 'Is New'),
            'is_sale' => Yii::t('app', 'Is Sale'),
            'is_hit' => Yii::t('app', 'Is Hit'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    public function getCategories(){
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getBrands(){
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }


}
