<?php

class View
    implements Countable, Iterator
{
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function count()
    {
        return count($this->data);
    }

    public function display($template)
    {
        extract($this->data);
        //ob_start();
        include(__DIR__ . '/../views/' . $template);
        //$content = ob_get_contents();
        //ob_end_clean();
        // обрабатываем регулярным выражением
        // .. здесь будет еще код
        //echo $content;
    }

    public function current()
    {
        // TODO: Implement current() method.
       // echo ' current = ' . current($this->data);
        return current($this->data);
    }


    public function next()
    {
        // TODO: Implement next() method.
       // echo ' next ';
        return next($this->data);
    }

    public function key()
    {
        // TODO: Implement key() method.
       // echo ' key ';
        return key($this->data);
    }

    public function valid()
    {
        // TODO: Implement valid() method.
       // echo ' valid ';
        return false !== current($this->data);
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
       // echo ' rewind ';
        return reset($this->data);
    }
}