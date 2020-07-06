<?php

namespace app\controllers;

use app\models\User;
use app\models\repositories\UserRepository;
use app\services\Request;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = (new UserRepository())->getUserBySession(true);
        echo $this->render('users/user', ['user' => $user]);
    }

    public function actionAuth()
    {
        $login = (new Request())->post('login');
        $password = (new Request())->post('password');
        if ($login) {
            $user = (new UserRepository())->isCorrectPassword($login, $password);
            if ($user) {
                $user->startSession();
                return header("Location: /user");
            } else {
                echo 'Логин/пароль неверный.';
                echo $this->render('users/auth');
            }
        } else {
            $auth = (new UserRepository())->isAuth();
            if ($auth) {
                return header("Location: /user");
            }
            echo $this->render('users/auth');
        }
        
    }

    public function actionRegister()
    {
        $login = (new Request())->post('login');
        $password = (new Request())->post('password');
        $name = (new Request())->post('name');
        if ($login) {
            $user = $products = (new UserRepository())->create($login, $password, $name);
            if (!$user) {
                echo 'Такой аккаунт уже зарегистрирован.';
                echo $this->render('users/register', ['user' => $user]);
            } else {
                return header('Location: /user');
            }
        } else {
            $user = (new UserRepository())->getUserBySession();
            echo $this->render('users/register', ['user' => $user]);
        }
    }

    public function actionExit()
    {
        $user = (new UserRepository())->getUserBySession(true);
        $user->exit();
        echo $this->render('users/exit');
    }
}