<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\V1\CurrencyConverterContract;
use Log;

class CurrencyController extends Controller
{
    /**
     * @var \App\Contracts\V1\CurrencyConverterContract
     */
    private $converter;

    /**
     * @param \App\Contracts\V1\CurrencyConverterContract $converter
     *
     * @return void
     */
    public function __construct(CurrencyConverterContract $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function convert(Request $request)
    {
        //
    }
}
