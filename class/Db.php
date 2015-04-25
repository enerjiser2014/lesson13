<?php

class Db
{
    protected $dbh;
    public function __construct($siteconfig)
    {
        $conf = include $siteconfig;
        $dsn = 'mysql:dbname='. $conf['dbname'].';'. 'host='. $conf['dbhost'];
        $this->dbh = new Pdo($dsn, $conf['dbuser'], $conf['dbpassword']);
    }

    public function getRecords($class, $sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS);
    }

    public function getRecord($class, $sql, $params = [])
    {
        return $this->getRecords($class, $sql, $params )[0];
    }

    public function sqlExec($sql)
    {
        //return mysql_query($sql);
    }
}