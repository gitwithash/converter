<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\V1\CurrencyConverterContract;
use Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\V1\ConvertRequest;

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
    public function convert(ConvertRequest $request)
    {
        $data = $request->validated();

        $from   = $data['from'] ?? config('app.default_currency', 'EUR');
        $amount = $data['amount'] ?? 1;
        $to     = $data['to'];
        $locale = $data['locale'] ?? config('app.locale');

        $result = $this->converter->convert($from, $to, (float) $amount);

        return response()->json(array_merge(
            [
                'result' => $result,
                'result_in_locale' => $this->converter->intoLocale($result, $to, $locale),
                'result_in_words'  => $this->converter->intoWords($result, $to, $locale),
            ],
            $data,
        ));
    }
}
