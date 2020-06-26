<?php

namespace app\controllers;

use app\models\Product;

class ProductsController extends Controller {
    public function actionIndex()
    {
        echo "products";
    }

    public function actionProducts()
    {
        $products = Product::getAll();
        echo $this->render('products', ['products' => $products]);
    }
}