<?php use yii\helpers\Html;?>

    <div class="table-responsive">
        <table style="width:100%; border: 1px solid #ddd; border-collapse: collapse;" class="table table-hover table-striped" >
            <thead>
            <tr style="background: #f9f9f9;">

                <th style="padding: 8px; border: 1px solid #ddd;">Name</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Quantity</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Price</th>
                <th style="padding: 8px; border: 1px solid #ddd;">Summary</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($session['cart'] as $id=>$item){
                ?>
                <tr>

                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name']?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty']?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price']?></td>
                    <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty']*$item['price']?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">Total:</td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.qty'];?></td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">Amount:</td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.sum'];?></td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;" colspan="3">For details -> 043734005</td>
            </tr>
            </tbody>
        </table>
    </div>

