<?php

namespace Crud;

use \RuntimeException;

trait GetInputFilter
{

    protected $inputFilter;

    public function getInputFilter()
    {
        if (null == $this->inputFilter) {
            $filter = $this->getInputFilterClassName();
            if (!class_exists($filter)) throw new RuntimeException ("Filter \"{$filter}\" not found");
            $this->inputFilter = new $filter();
        }
        return $this->inputFilter;
    }

    private function getInputFilterClassName()
    {
        $class = get_called_class();
        $class = str_replace('DoctrineORMModule\\Proxy\\__CG__\\', '', $class);
        $classParts = explode('\\', $class);
        $classParts[1] = 'Filter';
        return implode('\\', $classParts);
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }

}