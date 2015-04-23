<?php

class Date
{
    protected $day;
    protected $month;
    protected $year;

    public function  __set($k, $v)
    {
        $this->$k = $v;
    }

    public function __get($k)
    {
        if ($k == ' unixtime') {
            return strtotime($this->year . '-' . $this->month . '-' . $this->day);
        }
    }
}