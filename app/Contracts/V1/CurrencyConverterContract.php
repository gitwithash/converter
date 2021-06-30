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

    /**
     * Function to convert $amount from $from to $to.
     *
     * @param String $from
     * @param String $to
     * @param Float  $amount
     *
     * @return Float|null
     */
    public function convert(String $from, String $to, ?Float $amount):?Float;

    /**
     * This function will find the exchange rate.
     *
     * @param String $from
     * @param String $to
     *
     * @return Float
     */
    public function findExchangeRate(String $from, String $to);

    /**
     * Currency formating to given locale
     *
     * @param Float         $number
     * @param String        $to
     * @param String|null   $locale
     *
     * @return String
     */
    public function intoLocale(Float $number, String $to, ?String $locale = 'en-GB');

    /**
     * Convert the amount to words.
     * @todo Fix this to use currency name
     *
     * @param Float         $number
     * @param String        $to
     * @param String|string $locale
     *
     * @return String
     */
    public function intoWords(Float $number, String $to, ?String $locale = 'en-GB');
}
