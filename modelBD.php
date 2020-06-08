<?php

abstract class Model implements \interfaces\ModelInterface
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = new \services\Db();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
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
        $sql = mysqli_real_escape_string("UPDATE {$this->tableName} SET {$paramsSql} WHERE id = {$id}");
        return $this->db->execute($sql);
    }

    public function updateAll(array $params) {
        foreach ($params as $key => $value) {
            $paramsSql .= "`{$key}` = {$value}, ";
        }
        $paramsSql = rtrim($paramsSql, ', ');
        $sql = mysqli_real_escape_string("UPDATE {$this->tableName} SET {$paramsSql}");
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

        $sql = mysqli_real_escape_string("INSERT INTO {$this->tableName} ({$paramsKey}) VALUES ({$paramsValue})");
        return $this->db->execute($sql);
    }

    public function deleteById(int $id) {
        $sql = mysqli_real_escape_string("DELETE FROM {$this->tableName} WHERE id = {$id}");
        return $this->db->execute($sql);
    }
}

?>