<?php

namespace LaravelEnso\Currencies\app\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Currencies\app\Models\ExchangeRate;
use LaravelEnso\Tables\app\Contracts\Table;

class ExchangeRateTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/exchangeRates.json';

    public function query() : Builder
    {
        return ExchangeRate::selectRaw('
            exchange_rates.id, fromCurrencies.short_name as "from",
            toCurrencies.short_name as "to", exchange_rates.conversion,
            exchange_rates.date
        ')->join('currencies as fromCurrencies', 'fromCurrencies.id', '=', 'exchange_rates.from_id')
        ->join('currencies as toCurrencies', 'toCurrencies.id', '=', 'exchange_rates.to_id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
