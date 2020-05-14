<?php

namespace core;

class Request

{
    public $defaultControllerName = 'task';
    public $defaultActionName = "index";

    public function resolve()
    {
        $result = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($result);
        if (!isset($result[0]) || !$result[0])
        {
            $result[0] = $this->defaultControllerName;
        }
        if (!isset($result[1]) || !$result[1])
        {
            $result[1] = $this->defaultActionName;
        }
        if (!isset($result[2]))
        {
            $result[2] = '';
        }
        return $result;
    }
}