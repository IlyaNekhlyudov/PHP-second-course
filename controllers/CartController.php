<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\models\repositories\CartRepository;
use app\services\Request;

class CartController extends Controller {
    public function actionIndex()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $cart = (new CartRepository())->getAllByUserId($user->id);
        echo $this->render('cart/cart', ['cart' => $cart, 'user' => $user]);
    }

    public function ActionAdd()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $itemID = (new Request())->post('id');
        if ($itemID) {
            (new CartRepository())->addItem($user->id, $itemID);
        } else {
            (new Request())->redirect();
        }
    }

    public function ActionRemove()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $itemID = (new Request())->post('id');
        if ($itemID) {
            (new CartRepository())->removeItem($user->id, $itemID);
        } else {
            (new Request())->redirect('/cart');
        }
    }
}