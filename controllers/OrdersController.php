<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\models\repositories\CartRepository;
use app\models\repositories\OrderRepository;
use app\services\Request;


class OrdersController extends Controller {
    public function actionIndex()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $orders = (new OrderRepository())->getAllFromUserID($user->id);
        echo $this->render('orders/orders', ['orders' => $orders, 'user' => $user]);
    }

    public function actionAdd()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $address = (new Request())->post('address');
        $email = (new Request())->post('email');
        $phone = (new Request())->post('phone');

        if ($address) {
            $cart = (new CartRepository())->getAllByUserId($user->id);
            $order = (new OrderRepository())->add($user->id, $address, $email, $phone, $cart);

            if ($order) {
                (new Request())->redirect('/orders', 'Заказ успешно оформлен.');
            }
        } else {
            (new Request())->redirect();
        }  
    }
}