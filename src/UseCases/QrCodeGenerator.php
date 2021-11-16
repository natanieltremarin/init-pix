<?php

namespace Initdev\UseCases;

use Initdev\Entities\Acount;
use Initdev\Entities\Order;
use Initdev\Entities\Pix;
use chillerlan\QRCode\QRCode;

class QrCodeGenerator
{
    public static function generate(
        string $key,
        string $beneficiary_name,
        string $beneficiary_city,
        float $value,
        string $identificator
    )
    {
        $patern = (new Pix(
            new Acount($key, $beneficiary_name, $beneficiary_city),
            new Order($identificator, $value)
        ))->getPatern();

        return (new QRCode())->render($patern);
    }
}