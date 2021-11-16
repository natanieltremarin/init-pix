<?php

namespace Initdev\Utils;

class Crc16
{
    public static function calculate(string $code)
    {
        $polynomial = 0x1021;
        $result = 0xFFFF;

        for ($offset = 0; $offset < strlen($code); $offset++) {
            $result ^= (ord($code[$offset]) << 8);

            for ($i = 0; $i < 8; $i++) {

                if (($result <<= 1) & 0x10000) {
                    $result ^= $polynomial;
                }

                $result &= 0xFFFF;
            }
        }

        return strtoupper(dechex($result));
    }
}