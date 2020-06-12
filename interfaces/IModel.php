<?php
namespace app\interfaces;

interface IModel
{
    public function getById(int $id): array;

    public function getAll();

    public function getTableName(): string;

}