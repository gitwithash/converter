<?php

namespace App\Contracts\V1;

interface CurrencyConverterContract
{
    /**
     * Function to fetch the exchange rate with $baseCurrency
     *
     * @param string|null $baseCurrency
     *
     * @return Array<string,string>
     */
    public function fetchExchangeRates(?String $baseCurrency):Array;
}
