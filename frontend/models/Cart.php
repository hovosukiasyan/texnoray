<?php
/**
 * Created by PhpStorm.
 * User: Ar
 * Date: 09.07.2018
 * Time: 17:18
 */

namespace frontend\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

    public function addToCart($product,$qty=1){
       // $_SESSION['cart.qty'];
       // $_SESSION['cart.sum'];
     if(isset($_SESSION['cart'][$product->id])){
         $_SESSION['cart'][$product->id]['qty'] += $qty;
     }else{
         $_SESSION['cart'][$product->id]=[
             'qty'=>$qty,
             'name'=>$product->title,
             'price'=>$product->price,
             'image'=>$product->image

         ];
     }
     if(isset($_SESSION['cart.qty'])){
            $_SESSION['cart.qty']+=$qty;
        }else{
         $_SESSION['cart.qty']=$qty;
     }
     if(isset($_SESSION['cart.sum'])){
         $_SESSION['cart.sum']+=$qty * $product->price;
     }else{
         $_SESSION['cart.sum']=$qty * $product->price;
     }
 }

  public function recalc($id){
     if(!isset($_SESSION['cart'][$id])){
         return false;
     }
     $qtyMinus=$_SESSION['cart'][$id]['qty'];
     $sumMinus=$_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
      $_SESSION['cart.qty'] -= $qtyMinus;
      $_SESSION['cart.sum'] -= $sumMinus;
      unset($_SESSION['cart'][$id]);
  }
}