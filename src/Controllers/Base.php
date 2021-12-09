<?php

namespace Initdev\Controllers;

use Exception;
use Initdev\Config\DataEntries;
use stdClass;

abstract class Base
{
    protected $dataEntries;
    protected $viewData;

    public function __construct()
    {
        $this->dataEntries = DataEntries::getData();
        $this->viewData = new stdClass();
    }

    public function renderPage(string $pageName)
    {
        $pageName =  str_replace('Controllers', 'Pages/' . $pageName . '.php', dirname(__FILE__));

        if (!file_exists($pageName)) {
            throw new Exception('This page is not defined');
        }

        foreach ($this->viewData as $atribute => $value) {
            ${$atribute} = $value;
        }

        ob_start();
        include $pageName;
        $html = ob_get_contents();

        ob_end_clean();
        return $html;
    }
}