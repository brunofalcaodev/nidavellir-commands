<?php

namespace Nidavellir\Commands;

use Illuminate\Support\ServiceProvider;
use Nidavellir\Commands\Commands\Alerts\TriggerAlert;
use Nidavellir\Commands\Commands\Coingecko\RefreshTokensCanonicals as CoingeckoRefreshTokensCanonicals;
use Nidavellir\Commands\Commands\Coingecko\RefreshTokensUrls as CoingeckoRefreshTokensUrls;
use Nidavellir\Commands\Commands\Kucoin\UpdateAllTokens;
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
            CoingeckoRefreshTokensCanonicals::class,
            CoingeckoRefreshTokensUrls::class,
            UpdateAllTokens::class,
            TriggerAlert::class,
        ]);
    }

    public function register()
    {
        //
    }
}
