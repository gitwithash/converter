<?php

namespace App\Contracts\V1;

interface ExchangeRateRepositoryContract
{
    public function getExchangeRate(String $from, String $to);
}
