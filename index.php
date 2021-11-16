<?php

require_once "vendor/autoload.php";

use Initdev\Config\DefaultOutput;
use Initdev\Config\UrlDirect;

$otput = new DefaultOutput();

try {
    ini_set('display_errors', 1);
    error_reporting(E_ERROR);

    $otput->putSuccess(
        (new UrlDirect)->execute()
    );

} catch (Exception $error) {
    $otput->putError($error->getMessage());
}

$otput->dumpContent();