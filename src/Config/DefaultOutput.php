<?php

namespace Initdev\Config;

class DefaultOutput
{
    public $success;
    public $error;

    public function __construct()
    {
        header("Content-type: application/json");
    }

    public function putError(string $message)
    {
        $this->error = $message;
    }

    public function putSuccess($content)
    {
        $this->success = $content;
    }

    public function dumpContent()
    {
        exit(json_encode($this));
    }
}