<?php

require_once __DIR__ . '/../class/Db.php';

abstract class Model
{
    protected static $table='my table';
    public static function getTable()
    {
        return static::$table;
    }

    public static function findAll()
    {
        $sql =  'SELECT * FROM ' . static::getTable();
        $db = new Db(__DIR__ . '/../siteconfig.php');
        return $db->getRecords($sql);
    }

}

