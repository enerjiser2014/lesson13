<?php

class Db
{
    protected $dbh;
    public function __construct($conf)
    {
        $dsn = 'mysql:dbname='. $conf['dbname'].';'. 'host='. $conf['dbhost'];
        $this->dbh = new Pdo($dsn, $conf['dbuser'], $conf['dbpassword']);
    }

    public function getRecords($class, $sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getRecord($class, $sql, $params = [])
    {
        return $this->getRecords($class, $sql, $params )[0];
    }

    public function sqlExec($class, $sql,$params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $sth->fetchAll(PDO::FETCH_CLASS, $class);
        return $this->dbh->lastInsertId();
    }
}