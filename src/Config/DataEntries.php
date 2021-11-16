<?php

namespace Initdev\Config;

class DataEntries
{
    private static $data;

    public static function getData()
    {
        if (empty(self::$data) && !empty($_POST)) {
            self::$data = (object) $_POST;
        }

        if (empty(self::$data)) {
            self::$data = json_decode(file_get_contents('php://input'));
        }

        if (empty(self::$data) && !empty($_GET)) {
            self::$data = (object) $_GET;
        }

        return self::$data;
    }
}