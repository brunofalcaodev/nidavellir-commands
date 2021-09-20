<?php

namespace Nidavellir\Commands\Commands\Alerts;

use Illuminate\Console\Command;
use Nidavellir\Apis\Kucoin;
use Nidavellir\Cube\Models\Api;
use Nidavellir\Cube\Models\Token;

class TriggerAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nidavellir:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Triggers a TradingView alert, as if it was called from the webhook';

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
         * api:<apis.hashcode>
         * action:<buy | sell | panic>
         * amount:<4500 | min 4500 | max 4500 | 25% | max 25% | min 25%>
         * token:{{ticker}}
         * type:<market | limit>
         * limit:<+1% | -1%>
         */

        $hashcode = Api::firstWhere('id', rand(1, 50))->hashcode;

        $body = "api:{$hashcode}
action:buy
amount:4500
token:{{ticker}}
type:market";

        Pipeline::set('headers', [])
                ->set('body', $body)
                ->onPipeline(ProcessAlertPipeline::class)
                ->execute();

        return 0;
    }
}
