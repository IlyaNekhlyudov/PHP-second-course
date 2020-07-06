<?php


namespace app\models\repositories;

use app\models\Record;
use app\services\Db;

abstract class Repository
{
    protected $db = null;
    public $isUpdate = [];

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getById(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($this->getRecordClass(), $sql, [':id' => $id])[0];
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete(Record $record)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $record->id]);
    }

    

    public function catch($name)
    {
        if ($this->$name != $name && property_exists(get_class($this), $name)) {
            return $this->isUpdate["{$name}"] = true;
        }
        return false;
    }

    abstract public function getRecordClass(): string;
}