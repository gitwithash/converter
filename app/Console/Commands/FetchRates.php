<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contracts\V1\CurrencyConverterContract;

class FetchRates extends Command
{
    private $converter;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch exchange rates with a base currency.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyConverterContract $converter)
    {
        $this->converter = $converter;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
