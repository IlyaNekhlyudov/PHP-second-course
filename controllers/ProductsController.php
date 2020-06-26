<?php

namespace app\controllers;

use app\models\Product;
use app\models\User;

class ProductsController extends Controller {
    public function actionIndex()
    {
        $user = User::getUserBySession(true);
        $products = Product::getAll();
        echo $this->render('products/products', ['products' => $products]);
    }
}