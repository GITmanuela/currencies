<?php

use Illuminate\Database\Seeder;
use LaravelEnso\Currencies\app\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $this->currencies()->each(function ($currency) {
            Currency::create($currency);
        });
    }

    public function currencies()
    {
        return collect([
            ['short_name' => 'RON', 'name' => 'Romanian Leu', 'symbol' => 'leu-sign', 'is_default' => true],
            ['short_name' => 'EUR', 'name' => 'Euro', 'symbol' => 'euro-sign', 'is_default' => false],
            ['short_name' => 'USD', 'name' => 'US Dollar', 'symbol' => 'dollar-sign', 'is_default' => false],
            ['short_name' => 'GBP', 'name' => 'GB Pound', 'symbol' => 'pound-sign', 'is_default' => false],
        ]);
    }
}
