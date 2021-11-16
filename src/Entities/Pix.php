<?php

namespace Initdev\Entities;

use Initdev\Utils\Crc16;

class Pix
{
    private $patern;

    public function __construct(Acount $acount, Order $order)
    {
        $this->patern = [
            '00' => '01',
            '01' => '12',
            '26' => [
                '00' => 'BR.GOV.BCB.PIX',
                '01' => $acount->key
            ],
            '52' => '0000',
            '53' => '986',
            '54' => number_format($order->value, 2, '.', ''),
            '58' => 'BR',
            '59' => $acount->beneficiary_name,
            '60' => $acount->beneficiary_city,
            '62' => [
                '05' => $order->id
            ]   
        ];
    }

    public function getPatern(): string
    {
        $codePix = '';

        foreach ($this->patern as $id => $part) {            

            if (is_array($part)) {
                $part = '';

                foreach ($this->patern[$id] as $subId => $subPart) {
                    $part .= $subId . str_pad(strlen($subPart), 2, '0', STR_PAD_LEFT) . $subPart;
                }
            }

            $codePix .= $id . str_pad(strlen($part), 2, '0', STR_PAD_LEFT) . $part;
        }

        $codePix .= '6304';
        return $codePix . Crc16::calculate($codePix);
    }
}