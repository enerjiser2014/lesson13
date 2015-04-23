<?php

class Db
{
    public function __construct($siteconfig)
    {
        $conf = include $siteconfig;
        mysql_connect(
            $conf['dbhost'],
            $conf['dbuser'],
            $conf['dbpassword']
        );
        mysql_select_db($conf['dbname']);
    }

    public function getRecords($sql)
    {
        $res = mysql_query($sql);
        if (false === $res ) {
            return false;
        }
        $ret = [];
        while ($row = mysql_fetch_array($res)) {
                $ret[] = $row;
        }
        return $ret;
    }

    public function getRecord($sql)
    {
        return $this->getRecords($sql)[0];
    }

    public function sqlExec($sql)
    {
        return mysql_query($sql);
    }
}