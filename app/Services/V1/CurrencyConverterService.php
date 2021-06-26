<?php

namespace App\Services\V1;

use App\Contracts\V1\CurrencyConverterContract;

class CurrencyConverterService implements CurrencyConverterContract
{
    /**
     * Function to fetch the exchange rate with $baseCurrency
     *
     * @param string|null $baseCurrency
     *
     * @return Array<string,string>
     */
    public function fetchExchangeRates(?String $baseCurrency):Array
    {
        $baseCurrency ??= config('app.default_currency', 'EUR');

    }
}
