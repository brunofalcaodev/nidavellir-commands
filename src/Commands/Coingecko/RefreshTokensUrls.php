<?php

namespace Nidavellir\Commands\Commands\Coingecko;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Coingecko\RefreshTokensUrls as TokensJob;

class RefreshTokensUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coingecko:refresh-tokens-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshs tokens urls until a maximum of 250';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Refreshing tokens urls...');

        TokensJob::dispatch();

        $this->info('Done.');

        return 0;
    }
}
