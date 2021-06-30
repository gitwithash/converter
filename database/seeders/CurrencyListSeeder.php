<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\V1\Currency;

class CurrencyListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencyListFileLocation = 'https://gist.githubusercontent.com/Fluidbyte/2973986/raw/5fda5e87189b066e11c1bf80bbfbecb556cf2cc1/Common-Currency.json';
        $currencyListJson = @file_get_contents($currencyListFileLocation);
        if (false === $currencyListJson) {
            $this->command->error('Unable to fetch the currency list.');
            exit;
        }

        $currencyList = json_decode($currencyListJson, 1);
        ksort($currencyList);

        $insertData = [];
        $now = \Carbon\Carbon::now();
        foreach ($currencyList as $code => $details) {
            array_push($insertData, [
                'code' => $code,
                'name' => $details['name'],
                'symbol' => $details['symbol'],
                'symbol_native' => $details['symbol_native'],
                'name_plural' => $details['name_plural'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            if (count($insertData) >= 1000) {
                Currency::insert($insertData);
                $insertData = [];
            }
        }
        if (count($insertData) > 0) {
            Currency::insert($insertData);
        }
    }
}
