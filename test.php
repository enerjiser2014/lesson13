<?php


class A {
    protected static $xxx='x';

    public static function getxxx() {
        return static::$xxx;
    }
}

class B extends A {
    protected static $xxx='y';
}

class C extends B {
    protected static $xxx="c";

}

echo C::getxxx();

//echo NewsArticle::getAllRecords();