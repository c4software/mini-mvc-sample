<?php

namespace models\base;

/**
 * Interface IDatabase
 * @package models\base
 * @property string $tableName
 * @property string $primaryKey
 */
interface IDatabase
{
    public function getAll();

    public function getOne(String $id);

    public function deleteOne(String $id);

    public function updateOne(String $id, array $data);
}