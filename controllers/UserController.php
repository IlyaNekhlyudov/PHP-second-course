<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = User::getUserBySession(true);
        echo $this->render('users/user', ['user' => $user]);
    }

    public function actionAuth()
    {
        if ($_POST['login']) {
            $user = User::isCorrectPassword($_POST);
            if ($user) {
                $user->startSession();
                return header("Location: /?c=user");
            } else {
                echo 'Логин/пароль неверный.';            }
        } else {
            if (User::isAuth()) {
                return header("Location: /?c=user");
            }
            echo $this->render('users/auth');
        }
        
        
    }

    public function actionRegister()
    {
        if ($_POST['login']) {
            $user = User::create($_POST);
            if (!$user) {
                echo 'Такой аккаунт уже зарегистрирован.';
                echo $this->render('users/register', ['user' => $user]);
            } else {
                return header('Location: /?c=user');
            }
        } else {
            $user = User::getUserBySession();
            echo $this->render('users/register', ['user' => $user]);
        }
    }

    public function actionExit()
    {
        $user = User::getUserBySession(true);
        $user->exit();
        echo $this->render('users/exit');
    }
}