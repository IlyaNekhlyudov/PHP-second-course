<?php

namespace app\models\repositories;

use app\models\User;
use app\services\db;
use app\services\Request;

class UserRepository extends Repository
{
    public static function getTableName(): string
    {
        return "users";
    }

    public function getRecordClass(): string
    {
        return User::class;
    }

    public function create($login, $password, $name)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $result = Db::getInstance()->queryOne($sql, [':login' => $login]);
        if ($result) {
            return false;
        } 

        $password = md5($password);
        $user = new User(null, $login, $password, $name);
        $user->save();
        $user->startSession();
        return $user; 
          
    }

    public function isAuth()
    {
        $session = (new Request())->session('userID');
        if ($session) {
            return true;
        } else {
            return false;
        }
    }

    public function isCorrectPassword($login, $password)
    {
        $user = User::getUser($login, $password);
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function getUserBySession($redirect = null)
    {
        session_start();
        $session = (new Request())->session('userID');
        if ($session) {
            return (new UserRepository())->getById($session);
        } else {
            if ($redirect) {
                return header("Location: /user/auth");
            } else {
                return false;
            }
        }
    }
}