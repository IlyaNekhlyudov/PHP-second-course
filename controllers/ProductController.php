<?php


namespace app\controllers;

use app\models\Product;
use app\models\User;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo "catalog";
    }

    public function actionCard()
    {
        $user = User::getUserBySession(true);
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->render('products/product_card', ['model' => $model]);
    }
}