<?php

namespace Nidavellir\Commands\Commands\Coingecko;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Jobs\Coingecko\RefreshTickersCanonicals as TickersJob;

class RefreshTickersCanonicals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coingecko:refresh-tickers-canonicals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds new tickers, updates the current ones if necessary';

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
        $this->info('Refreshing all Coingecko tickers canonicals...');

        TickersJob::dispatch();

        $this->info('Done.');

        return 0;
    }
}
