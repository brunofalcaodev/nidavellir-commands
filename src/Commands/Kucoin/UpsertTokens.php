<?php

namespace Nidavellir\Commands\Commands\Kucoin;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Kucoin\UpsertTokensJob;

class UpsertTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kucoin:upsert-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '( https://docs.kucoin.com/#get-all-tokens )';

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
