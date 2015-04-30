<?php

namespace App\Models;

abstract class Model
{
    protected $magicProp = [];

    public $id;


    public static function getTable()
    {
        return static::$table;
    }

    public function __get($name)
    {
        return $this->magicProp[$name];
    }

    public function __set($name, $value)
    {
        $this->magicProp[$name] = $value;
    }

    public static function getAllRecords()
    {
        $sql = 'SELECT * FROM ' . static::getTable();
        $db = new Db(Conf::newsDb());
        return $db->getRecords(static::class, $sql);
    }

    public static function getOneRecord($id)
    {
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE id=:id';
        $db = new Db(Conf::newsDb());
        $ret = $db->getRecord(static::class, $sql, [':id' => $id]);
        if (false != $ret) {
            return $ret;
        }
        else {
            throw new E404Exception('Не найдена запись в базе данных.');
        }
    }

    public function insert()
    {
        $keys = array_keys($this->magicProp);
        $vals = array_values($this->magicProp);

        $sql = 'INSERT INTO ' . static::getTable() . '
                (' . '`' . implode($keys, '`,`') . '` )
                VALUES
                (' . '\'' . implode($vals, '\',\'') . '\' )
                ';

        $db = new Db(Conf::newsDb());
        return $db->sqlExec(static::class, $sql);
    }

    public function update()
    {
        if (false == $this->id) {
            throw new E404Exception('Невозможно обновить запись с несуществующим полем id');
        }

        $arr = [];
        foreach($this->magicProp as $k => $v)
        {
            $arr[] = $k . '=\'' . $v . '\'';
        }

        $sql = 'UPDATE ' . static::getTable() . '
                SET ' . implode(',', $arr) . '
                WHERE id=\'' . $this->id . '\'';

        $db = new Db(Conf::newsDb());

        return $db->sqlExec(static::class, $sql);
    }
}

