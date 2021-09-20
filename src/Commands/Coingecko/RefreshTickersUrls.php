<?php

namespace Nidavellir\Commands\Commands\Coingecko;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Jobs\Coingecko\RefreshTickersUrls as TickersJob;

class RefreshTickersUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coingecko:refresh-tickers-urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshs tickers urls until a maximum of 250';

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
        $this->info('Refreshing tickers urls...');

        TickersJob::dispatch();

        $this->info('Done.');

        return 0;
    }
}
