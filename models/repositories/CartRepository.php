<?php

namespace app\models\repositories;

use app\models\Cart;
use app\models\repositories\ProductRepository;
use app\services\db;
use app\services\Request;

class CartRepository extends Repository
{
    public static function getTableName(): string
    {
        return "cart";
    }

    public function getRecordClass(): string
    {
        return Cart::class;
    }

    public function getAllByUserId(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE userID = :id";
        $cart = Db::getInstance()->queryAll($sql, [':id' => $id]);

        if ($cart) {
            return $cart;
        }
        return false;
    }

    public function deleteByProductId(int $userID, int $productID)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE productID = :productID AND userID = :userID";
        return Db::getInstance()->execute($sql, [':productID' => $productID, ':userID' => $userID]);
    }

    public function addItem(int $userID, int $itemID)
    {
        $itemCart = (new Cart())->getItemByUser($userID, $itemID);

        if ($itemCart) {
            $itemCart->setQuantity($itemCart->quantity + 1);
        } else {
            $product = (new ProductRepository())->getById($itemID);
            $itemCart = new Cart(null, $itemID, $product->image, $product->name, $product->price, 1, date('H:i:s d.m.Y'), $userID);
        }            
        $itemCart->save();
        
        $refererPage = (new Request())->getRefererPage();
        (new Request())->redirect($refererPage, 'Товар успешно добавлен в корзину.');
    }

    public function removeItem(int $userID, int $itemID)
    {
        $itemCart = (new Cart())->getItemByUser($userID, $itemID);

        if ($itemCart->quantity > 1) {
            $itemCart->setQuantity($itemCart->quantity - 1);
            $itemCart->save();
        } else {
            (new CartRepository())->deleteByProductId($userID, $itemID);
        }

        $refererPage = (new Request())->getRefererPage();
        (new Request())->redirect($refererPage, 'Товар успешно удалён из корзины.');
    }

    public function removeAllItems(int $userID)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE userID = :userID";
        return Db::getInstance()->execute($sql, [':userID' => $userID]);
    }
}