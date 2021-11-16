<?php

namespace Initdev\Controllers;

class Home extends Base
{
    public function load()
    {
        header('Content-Type: text/html');
        exit($this->renderPage('Base'));
    }
}