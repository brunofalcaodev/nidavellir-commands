<?php

namespace Nidavellir\Commands\Commands;

use Illuminate\Console\Command;
use Nidavellir\Cube\Models\Token;
use Nidavellir\Workflows\Jobs\ProcessAlert;

class WebhookTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nidavellir:test';

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
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
         * api:A4FC12
         * action:buy
         * token:MASK
         * amount:4500
         * ticker:{{ticker}}
         * price:{{close}}.
         */
        $body = 'api:6145ac1eb8b9a
action:buy
amount:45a00
ticker:{{ticker}}
price:{{close}}';

        $headers = ['key1' => 'value1'];

        ProcessAlert::dispatch($headers, $body);

        return;

        $array = [
            'api:A4FC12',
            'action:buy',
            'ticker:{{ticker}}',
            'amount:4500',
            'price:{{close}}-0.5%', ];

        $collection = collect($array)->map(function ($item, $key) {
            $values = explode(':', str_replace(' ', '', $item));

            return [$values[0] => $values[1]];
        });

        $collection->collapse()->dump();

        return 0;
    }
}
