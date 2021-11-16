<?php

namespace Initdev\Entities;

class Acount
{
    public $key;
    public $beneficiary_name;
    public $beneficiary_city;

    public function __construct(
        string $key,
        string $beneficiary_name,
        string $beneficiary_city
    )
    {
        $this->key = $key;
        $this->beneficiary_name = $beneficiary_name;
        $this->beneficiary_city = $beneficiary_city;
    }
}