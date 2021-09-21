<?php

namespace Nidavellir\Commands\Commands\Coingecko;

use Illuminate\Console\Command;
use Nidavellir\Jobs\Coingecko\RefreshTokensCanonicals as TokensJob;

class RefreshTokensCanonicals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coingecko:refresh-tokens-canonicals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds new tokens, updates the current ones if necessary';

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
        $this->info('Refreshing all Coingecko tokens canonicals...');

        TokensJob::dispatch();

        $this->info('Done.');

        return 0;
    }
}
