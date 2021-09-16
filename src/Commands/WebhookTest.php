<?php

namespace Nidavellir\Commands\Commands;

use Illuminate\Console\Command;
use Nidavellir\Cube\Models\Token;

class WebhookTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nidavellir:webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ad-hoc webhook tests';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * api:A4FC12
         * action:buy
         * token:MASK
         * amount:4500
         * ticker:{{ticker}}
         * price:{{close}}.
         */
        $array = [
            'api:A4FC12',
            'action:buy', ];

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
