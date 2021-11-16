<?php

namespace Initdev\Entities;

class Order
{
    public $id;
    public $value;

    public function __construct(
        string $id,
        float $value
    )
    {
        $this->id = $id;
        $this->value = $value;   
    }
}