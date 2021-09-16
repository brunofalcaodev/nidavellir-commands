<?php

namespace Nidavellir\Commands;

use Illuminate\Support\ServiceProvider;
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
        ]);
    }

    public function register()
    {
        //
    }
}
