<?php
/**
 * Created by PhpStorm.
 * User: tea
 * Date: 7/1/18
 * Time: 2:30 PM
 */

namespace frontend\controllers;

use common\models\Brands;
use common\models\Categories;
use yii\web\Controller;
use common\models\Products;
use yii\data\Pagination;
use Yii;

class ProductController extends Controller
{

    public $layout = 'product';

    public function actionIndex()
    {


        $products=Products::find();

        $countQuery = clone $products;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'9']);
        $products = $products->offset($pages->offset)->limit($pages->limit)->asArray()->all();


        return $this->render('index',[
            'products'=>$products,
            'pages' => $pages
        ]);
    }

    public function actionBrand($slug)
    {
        $brands = Brands::find()->where(['slug'=>$slug])->one();

        $products=Products::find()->where(['brand_id'=>$brands['id']]);
        //var_dump($products->all());
        $countQuery = clone $products;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'9']);
        $products = $products->with('brands')->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('index',[
            'products'=>$products,
            'pages' => $pages,
            'brand' => $brands,
        ]);
    }

    public function actionSale()
    {
        $products=Products::find()->where(['is_sale'=>'1']);

        $countQuery = clone $products;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'9']);
        $products = $products->with('categories')->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('index',[
            'products'=>$products,
            'pages' => $pages
        ]);
    }

    public function actionCategory($slug){
        $category = Categories::find()->where(['slug'=>$slug])->one();
        $products=Products::find()->where(['category_id'=>$category['id']]);

        $countQuery = clone $products;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'9']);
        $products = $products->with('categories')->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('index',[
            'products'=>$products,
            'pages' => $pages,
            'category'=>$category,
        ]);
    }

    public function actionProduct($slug){

        $product = Products::find()->where(['slug'=>$slug])->one();
        $id=$product->id;
        return $this->render('product',['product'=>$product]);
    }

    public function actionSearch(){
        if(Yii::$app->request->isAjax){
            $data=[];
            $form_data=Yii::$app->request->post('data');
            parse_str($form_data,$data);
             //echo '<pre>';
             //print_r($data);
             //echo "</pre>";

            $products= Products::find();
            if(!empty($data['pr_brend'])){
                $products = $products->andWhere(['IN','brand_id',$data['pr_brend']]);
            }
            if(isset($data['min_price']) && !empty($data['max_price'])){
             $products = $products->andWhere(['between','price',(double)$data['min_price'],(double)$data['max_price']]);
            }
            $countQuery = clone $products;
            $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>'9']);
            $products = $products->with('brands')->offset($pages->offset)->limit($pages->limit)->asArray()->all();

            return $this->renderAjax('index',[
                'products'=>$products,
                'pages' => $pages,
            ]);

        }
    }

}
