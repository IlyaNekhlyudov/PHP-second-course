<?php
namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function updateById(int $id, array $params)
    {
        foreach ($params as $key => $value) {
            $paramsSql .= "`{$key}` = {$value}, ";
        }
        $sql = "UPDATE {$this->tableName} SET {$paramsSql} WHERE id = {$id}";
        return $this->db->execute($sql);
    }

    public function updateAll(array $params) {
        foreach ($params as $key => $value) {
            $paramsSql .= "`{$key}` = {$value}, ";
        }
        $paramsSql = rtrim($paramsSql, ', ');
        $sql = "UPDATE {$this->tableName} SET {$paramsSql}";
        return $this->db->execute($sql);
    }

    public function insert(array $params) 
    {
        foreach ($params as $key => $value) {
            $paramsKey .= "`{$key}`, ";
            $paramsValue .= "{$value}, ";
        }
        $paramsKey = rtrim($paramsKey, ', ');
        $paramsValue = rtrim($paramsValue, ', ');

        $sql = "INSERT INTO {$this->tableName} ({$paramsKey}) VALUES ({$paramsValue})";
        return $this->db->execute($sql);
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM {$this->tableName} WHERE id = {$id}";
        return $this->db->execute($sql);
    }
}