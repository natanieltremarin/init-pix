<?php

namespace Initdev\Controllers;

use Exception;
use Initdev\UseCases\QrCodeGenerator;

class Generator extends Base
{
    public function generate()
    {
        if (empty($this->dataEntries->key)) {
            throw new Exception('Enter the key');
        }

        if (empty($this->dataEntries->beneficiary_name)) {
            throw new Exception('Enter the name of the beneficiary');
        }

        if (empty($this->dataEntries->beneficiary_city)) {
            throw new Exception("Inform the beneficiary's city");
        }

        if (empty($this->dataEntries->order_value)) {
            throw new Exception('Enter the value');
        }

        if (empty($this->dataEntries->order_identificator)) {
            throw new Exception('Enter the identifier');
        }

        $this->viewData->qrCode = QrCodeGenerator::generate(
            strval($this->dataEntries->key),
            strtoupper(strval($this->dataEntries->beneficiary_name)),
            strtoupper(strval($this->dataEntries->beneficiary_city)),
            floatval($this->dataEntries->order_value),
            strval($this->dataEntries->order_identificator)
        );

        return $this->renderPage('Parts/QrCode');
    }
}