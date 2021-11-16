<?php

namespace Initdev\Config;

class UrlDirect
{
    private $direct_class;
    private $direct_function;

    public function __construct()
    {
        list($this->direct_class, $this->direct_function) = explode('/', 
            end(explode('?', $_SERVER['REQUEST_URI']))
        );
    }

    public function execute()
    {
        $name = $this->getDirectClass();
        $controller = new $name();
        $method = $this->getDirectFunction();
    
        if (!method_exists($controller, $method)) {
            $name = $this->getDirectClass();
            $method = 'load';
            $controller = new $name();
        }

        return $controller->$method();
    }

    private function getDirectClass()
    {
        if (!class_exists(Estructure::CONTROLLERS . $this->sanitizeName($this->direct_class))) {
            return Estructure::CONTROLLERS . 'Home';
        }

        return Estructure::CONTROLLERS . $this->sanitizeName($this->direct_class);
    }

    private function getDirectFunction()
    {
        return $this->sanitizeName($this->direct_function);
    }

    private function sanitizeName($name)
    {
        if (strpos($name, '-') !== false) {
            $brokenName = explode('-', $name);

            $name = '';
            foreach ($brokenName as $part) {
                $name .= ucfirst($part);
            }
        }

        return ucfirst($name);
    }
}