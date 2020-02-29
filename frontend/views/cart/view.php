<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')) :?>
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success');?>
    </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('error')) :?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif; ?>
<?php
if(!empty($session['cart'])){
    ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped" >
          <thead>
          <tr>
              <th>Photo</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Summary</th>
              <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
          </tr>
          </thead>
            <tbody>
            <?php
            foreach ($session['cart'] as $id=>$item){
                ?>
                <tr>
                <td><?= Html::img("@web/images/prod/".$item['image'],['height'=>50])?></td>
                <td><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['qty']*$item['price']?></td>
                <td><span data-id="<?= $id;?>"  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="5">Total:</td>
                <td><?= $session['cart.qty'];?></td>
            </tr>
            <tr>
                <td colspan="5">Amount:</td>
                <td><?= $session['cart.sum'];?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr/>
    <?php $form=ActiveForm::begin() ?>
    <?= $form->field($order,'name')?>
    <?= $form->field($order,'email')?>
    <?= $form->field($order,'phone')?>
    <?= $form->field($order,'address')?>
    <?=Html::submitButton('заказать',['class'=>'btn btn-success']) ?>
    <pre>
    <?= var_dump($session['cart']) ?>
    </pre>
    <?php ActiveForm::end()?>
   <?php
}else{
  ?>
    <h3>Cart is empty!</h3>
  <?php
}
?>
</div>
