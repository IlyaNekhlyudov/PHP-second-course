<?php
namespace app\models;

use app\services\Db;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $name;

    public function __construct($id = null, $login = null, $password = null, $name = null)
    {
        parent::__construct(Db::getInstance());
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
    }

    public function startSession()
    {
        session_start();
        return $_SESSION['userID'] = $this->id;
    }

    public function exit()
    {
        session_start();
        return $_SESSION['userID'] = null;
    }

    public static function getTableName(): string
    {
        return "users";
    }

    public static function getUserBySession($redirect = null)
    {
        session_start();
        if ($_SESSION['userID']) {
            return User::getById($_SESSION['userID']);
        } else {
            if ($redirect) {
                return header("Location: /?c=user&a=auth");
            } else {
                return false;
            }
            
        }
    }

    public static function isAuth()
    {
        session_start();
        if ($_SESSION['userID']) {
            return true;
        } else {
            return false;
        }
    }

    public static function isCorrectPassword($data)
    {
        $user = User::getUser($data['login'], $data['password']);
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public static function getUser($login, $password)
    {
        $password = md5($password);
        $tableName = static::getTableName();   
        $sql = "SELECT * FROM {$tableName} WHERE login = :login AND password = :password";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':login' => $login, ':password' => $password])[0];
    }

    public static function create($data)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $result = Db::getInstance()->queryOne($sql, [':login' => $data['login']]);
        if ($result) {
            return false;
        } 

        $password = md5($data['password']);
        $user = new User(null, $data['login'], $password, $data['name']);
        $user->save();
        $user->startSession();
        return $user; 
          
    }

}