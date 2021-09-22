<?php

namespace Nidavellir\Commands\Commands\Coingecko;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Coingecko\UpsertTokensJob;

class UpsertTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coingecko:upsert-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshs tokens urls';

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
        UpsertTokensJob::dispatch();

        return 0;
    }
}
