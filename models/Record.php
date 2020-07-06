<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;
use app\services\IDb;

abstract class Record
{
    public $id;
    public $updateArr = null;

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName', 'updateArr'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->getLastInsertId();
    }

    public function update()
    {
        $tableName = static::getTableName();
        $columns = null;
        foreach ($this->updateArr as $key => $value) {
            if ($value == false) {
                continue;
            }
            $columns .= "`{$key}`='{$this->$key}'";
        }

        $this->updateArr = []; // обнуление массива

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";
        return Db::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if ($this->id && $this->updateArr) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    public function catch($name)
    {
        if ($this->$name != $name && property_exists(get_class($this), $name)) {
            return $this->updateArr["{$name}"] = true;
        }
        return false;
    }
}