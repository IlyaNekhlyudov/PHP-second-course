<?php

namespace app\controllers;

use app\models\Product;
use app\models\User;
use app\services\Request;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

class ProductsController extends Controller {
    public function actionIndex()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $products = (new ProductRepository())->getAll();
        echo $this->render('products/products', ['products' => $products, 'user' => $user]);
    }

    public function actionCard()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $id = (new Request())->get('id');
        $model = (new ProductRepository())->getById($id);
        echo $this->render('products/product_card', ['model' => $model, 'user' => $user]);
    }
}