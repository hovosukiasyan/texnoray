<?php
use yii\bootstrap\Modal;

Modal::begin([
    'header'=>'<h2>Shopping Cart</h2>',
    'size'=> 'modal-lg',
    'id'=>'cart',
    'footer'=>' <button type="button" class="btn btn-default" data-dismiss="modal">Continue</button>
                <button type="button" class="btn btn-success">Make order</button> 
                <button type="button" class="btn btn-danger" onclick="clearCart()">Clear Cart</button>'
]);
Modal::end();
?>
<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>