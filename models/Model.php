<?php

require_once __DIR__ . '/../class/Db.php';

abstract class Model
{
    protected $magicProp = [];

    public $id;

    public static function getTable()
    {
        return static::$table;
    }

    public static function getAllRecords()
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable();
        $db = new Db(__DIR__ . '/../siteconfig.php');
        return $db->getRecords($class, $sql);
    }

    public static function getOneRecord($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE id=:id';
        $db = new Db(__DIR__ . '/../siteconfig.php');
        return $db->getRecord($class, $sql, [':id' => $id]);
    }

    public function insert()
    {
        echo 'insert()<br>';
        var_dump($this->magicProp);
        $class = static::class;
        foreach ($this->magicProp as $k => $v):
            echo $class . ' ' . $k . ' = ' . $v;
        endforeach;
    }

    public function __get($name)
    {
        return $magicProp[$name];
    }

    public function __set($name, $value)
    {
        $magicProp[$name] = $value;
    }
}

