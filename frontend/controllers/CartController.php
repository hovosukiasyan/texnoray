<?php
/**
 * Created by PhpStorm.
 * User: Ar
 * Date: 09.07.2018
 * Time: 17:07
 */

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\Cart;
use common\models\Products;
use Yii;
use common\models\Orders;
use common\models\OrderItems;

class CartController extends Controller
{

   public function actionAdd(){
       $id=Yii::$app->request->get('id');
       $product=Products::findOne($id);
       $session=Yii::$app->session;
       $session->open();
       $cart=new Cart();
       $cart->addToCart($product);
       $this->layout = false;
       return $this->render('cart-modal',[
           'session'=>$session,
       ]);
   }
    public function actionClear(){
        $session=Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal',[
            'session'=>$session,
        ]);
   }
   public function actionDelItem(){
       $id=Yii::$app->request->get('id');
       $session=Yii::$app->session;
       $session->open();
       $cart=new Cart();
       $cart->recalc($id);
       $this->layout = false;
       return $this->render('cart-modal',[
           'session'=>$session,
       ]);
   }
   public function actionShow(){
       $session=Yii::$app->session;
       $session->open();
       $this->layout = false;
       return $this->render('cart-modal',[
           'session'=>$session,
       ]);
   }
   public function actionView(){
       $session=Yii::$app->session;
       $session->open();
       Yii::$app->view->registerMetaTag([
           'name'=>'title',
           'content'=>'Shopping-Cart'
       ]);
       $order=new Orders();
       if($order->load(Yii::$app->request->post())){
         $order->qty=$session['cart.qty'];
         $order->sum=$session['cart.sum'];
         if($order->save()){
             $this->saveOrderItems($session['cart'],$order->id);
             Yii::$app->session->setFlash('success','Ваш заказ принят,скоро вам позвонят!');
             Yii::$app->mailer->compose('order',['session'=>$session])->setFrom('hovo-sukiasyan@mail.ru')->setTo($order->email)->setSubject('Order')->send();
            // Yii::$app->session->setFlash('success','Ваш заказ принят,скоро вам позвонят!');
             Yii::$app->mailer->compose('order',['session'=>$session])->setFrom('hovo-sukiasyan@mail.ru')->setTo(Yii::$app->params['adminEmail'])->setSubject('Order')->send();
             $session->remove('cart');
             $session->remove('cart.qty');
             $session->remove('cart.sum');
             return $this->refresh();
         }else{
             Yii::$app->session->setFlash('error','Ошибка при оформлении заказа!');
         }
       }
       return $this->render('view',[
           'session'=>$session,
           'order'=>$order,
       ]);
   }
   protected function saveOrderItems($items,$order_id){
        foreach($items as $id=>$item){
            $order_items=new OrderItems();
            $order_items->orders_id=$order_id;
            $order_items->product_id=$id;
            $order_items->title=$item['name'];
            $order_items->price=$item['price'];
            $order_items->qty_item=$item['qty'];
            $order_items->sum_item=$item['qty']* $item['price'];
            $order_items->save();
        }
   }
}