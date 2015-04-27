<?php

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
        return $db->getRecord(static::class, $sql, [':id' => $id]);
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
            echo error;
            exit;
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

