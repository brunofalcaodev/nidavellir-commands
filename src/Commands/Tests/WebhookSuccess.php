<?php

namespace Nidavellir\Commands\Commands\Tests;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Nidavellir\Cube\Models\Api;
use Nidavellir\Cube\Models\Token;
use Nidavellir\Jobs\Alerts\ProcessAlert;

class WebhookSuccess extends Command
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
         * token:MASKUSDT
         * amount:4500
         * token:{{token}}
         * type:market.
         */

        // Get a random api, so it works.
        $api = Api::inRandomOrder()->take(1)->first();

        $body = "api:{$api->hashcode}
action:buy
amount:50
token:ADAUSDT
type:market";

        $headers = ['key1' => 'value1'];

        //ProcessAlert::dispatchSync(null, $headers, $body);

        Http::withBody($body, 'text/plain')->post('http://localhost:8000/webhook');

        //ProcessAlert::dispatch($headers, $body);

        return;

        $array = [
            'api:A4FC12',
            'action:buy',
            'token:{{token}}',
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
