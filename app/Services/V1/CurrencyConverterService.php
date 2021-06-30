<?php

namespace App\Services\V1;

use App\Contracts\V1\CurrencyConverterContract;
use App\Contracts\V1\ExchangeRateRepositoryContract;

class CurrencyConverterService implements CurrencyConverterContract
{
    /**
     * Repository
     * @var \App\Contracts\V1\ExchangeRateRepositoryContract
     */
    private $exchangeRateRepo;

    /**
     * Constructor
     *
     * @param \App\Contracts\V1\ExchangeRateRepositoryContract $exchangeRateRepo
     */
    public function __construct(ExchangeRateRepositoryContract $exchangeRateRepo)
    {
        $this->exchangeRateRepo = $exchangeRateRepo;
    }

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
        //
    }

    /**
     * Function to convert $amount from $from to $to.
     *
     * @param String $from
     * @param String $to
     * @param Float  $amount
     *
     * @return Float|null
     */
    public function convert(String $from, String $to, ?Float $amount):?Float
    {
        $rate = $this->findExchangeRate($from, $to);
        $amount = round($amount * $rate, 2);
        return doubleval($amount);
    }

    /**
     * This function will find the exchange rate.
     *
     * @param String $from
     * @param String $to
     *
     * @return Float
     */
    public function findExchangeRate(String $from, String $to)
    {
        $rate = $this->exchangeRateRepo->getExchangeRate($from, $to);
        return doubleval($rate);
    }

    /**
     * Currency formating to given locale
     *
     * @param Float         $number
     * @param String        $to
     * @param String|null   $locale
     *
     * @return String
     */
    public function intoLocale(Float $number, String $to, ?String $locale = 'en-GB')
    {
        $numFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        return $numFormatter->formatCurrency($number, $to);
    }

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
    public function intoWords(Float $number, String $to, ?String $locale = 'en-GB')
    {
        $numFormatter = new \NumberFormatter($locale, \NumberFormatter::SPELLOUT);
        return ucwords($numFormatter->format($number));
    }
}
