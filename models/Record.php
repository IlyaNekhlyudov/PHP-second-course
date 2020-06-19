<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $id;
    protected $db = null;
    public $isUpdate = [];

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getById(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete()
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }

    public function update()
    {
        $tableName = static::getTableName();
        $columns = null;
        foreach ($this->isUpdate as $key => $value) {
            if ($value == false) {
                continue;
            }
            $columns .= "`{$key}`='{$this->$key}'";
        }

        $this->isUpdate = []; // обнуление массива

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function catch($name)
    {
        if ($this->$name != $name && property_exists(get_class($this), $name)) {
            return $this->isUpdate["{$name}"] = true;
        }
        return false;
    }

    public function save()
    {
        if ($this::getById($this->id) && $this->isUpdate) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }


}