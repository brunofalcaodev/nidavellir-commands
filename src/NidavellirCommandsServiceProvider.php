<?php

namespace Nidavellir\Commands;

use Illuminate\Support\ServiceProvider;
use Nidavellir\Commands\Commands\Alerts\TriggerAlert;
use Nidavellir\Commands\Commands\Coingecko\UpsertTokens as UpsertTokensCoingecko;
use Nidavellir\Commands\Commands\Kucoin\UpsertTokens as UpsertTokensKucoin;
use Nidavellir\Commands\Commands\Tests\WebhookSuccess;

class NidavellirCommandsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerCommands();
    }

    protected function registerCommands(): void
    {
        $this->commands([
            WebhookSuccess::class,
            UpsertTokensKucoin::class,
            UpsertTokensCoingecko::class,
            TriggerAlert::class,
        ]);
    }

    public function register()
    {
        //
    }
}
