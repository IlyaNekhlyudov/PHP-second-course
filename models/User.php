<?php
namespace app\models;

use app\services\Db;
use app\models\repositories\UserRepository;
use app\services\Request;

class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $name;

    public function __construct($id = null, $login = null, $password = null, $name = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
    }

    public function startSession()
    {
        return (new Request())->session('userID', $this->id);
    }

    public function exit()
    {
        session_start();
        return (new Request())->session('userID', 'delete');
    }

    public static function getTableName(): string
    {
        return "users";
    }

    public static function getUser($login, $password)
    {
        $password = md5($password);
        $tableName = static::getTableName();   
        $sql = "SELECT * FROM {$tableName} WHERE login = :login AND password = :password";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':login' => $login, ':password' => $password])[0];
    }

}