<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends Controller {
    public function actionIndex()
    {
        echo "cart";
    }

    public function actionCart()
    {
        $type = $_GET['type'];
        if ($type == 'add') {
            $id = $_GET['id'];
            $item = Cart::addItem($id);
            var_dump($item);
            // тут буду доделывать после юзеров, так как корзина привязывается к юзеру
        } else {
            $items = Cart::getItems();
            var_dump($items);
            // echo $this->render('cart', ['items' => $items]);
            // тут буду доделывать после юзеров, так как корзина привязывается к юзеру
        }
    }


}