<?php

namespace app\models\repositories;

use app\models\Order;
use app\models\repositories\CartRepository;
use app\models\repositories\UserRepository;
use app\services\db;

class OrderRepository extends Repository
{
    public static function getTableName(): string
    {
        return "orders";
    }

    public function getRecordClass(): string
    {
        return Order::class;
    }

    public function getAllFromUserID($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE userID = :id";
        $orders = Db::getInstance()->queryAll($sql, [':id' => $id]);

        foreach ($orders as $order) {
            $order['products'] = unserialize($order['products']);
        }

        return $orders;
    }

    public function add(int $userID, string $address, string $email, string $phone, array $cart)
    {
        $user = (new UserRepository())->getById($userID);

        $cart = serialize($cart);
        $order = new Order(null, date('H:i:s d.m.Y'), $userID, $email, $phone, $address, $cart);
        $order->save();
        (new CartRepository())->removeAllItems($userID);
        return $order;
    }
}