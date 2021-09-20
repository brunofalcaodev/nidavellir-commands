<?php

namespace Nidavellir\Commands;

use Illuminate\Support\ServiceProvider;
use Nidavellir\Commands\Commands\Coingecko\RefreshTickersCanonicals as CoingeckoRefreshTickersCanonicals;
use Nidavellir\Commands\Commands\Coingecko\RefreshTickersUrls as CoingeckoRefreshTickersUrls;
use Nidavellir\Commands\Commands\Kucoin\UpdateTickers;
use Nidavellir\Commands\Commands\WebhookTest;

class NidavellirCommandsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerCommands();
    }

    protected function registerCommands(): void
    {
        $this->commands([
            WebhookTest::class,
            CoingeckoRefreshTickersCanonicals::class,
            CoingeckoRefreshTickersUrls::class,
            UpdateTickers::class,
        ]);
    }

    public function register()
    {
        //
    }
}
