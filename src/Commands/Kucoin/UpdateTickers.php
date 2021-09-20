<?php

namespace Nidavellir\Commands\Commands\Kucoin;

use Illuminate\Console\Command;
use Nidavellir\Cube\Models\Api;
use Nidavellir\Kucoin\KucoinCrawler;

class UpdateTickers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kucoin:update-tickers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '( https://docs.kucoin.com/#get-all-tickers )';

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
        $this->info('Updating all Kucoin tickers...');

        $data = KucoinCrawler::withApi(Api::firstWhere('id', 1))
                                 ->allTickers();

        /**
         * From here, there is a lot of things to do.
         * 1. If the canonical doesn't exist, add it to the tickers table.
         * 2. If the quote doesn't exist, add it to the quotes table.
         * 3. If the pair (ticker-quote) doesn't exist, add it to the pairs table.
         * 4. Update all information on the pair given the latest data.
         */
        foreach ($data->response()['ticker'] as $ticker) {
            dd($ticker);
        }

        dd($data->response());

        /*
        KuCoinApi::setBaseUri('https://openapi-sandbox.kucoin.com');

        // Auth version v2 (recommend)
        $auth = new Auth('key', 'secret', 'passphrase', Auth::API_KEY_VERSION_V2);
        // Auth version v1
        // $auth = new Auth('key', 'secret', 'passphrase');

        $api = new Symbol($auth);

        try {
            $result = $api->getAllTickers();
            var_dump($result['ticker'][0]);
        } catch (HttpException $e) {
            var_dump($e->getMessage());
        } catch (BusinessException $e) {
            var_dump($e->getMessage());
        }

        return 0;
        */
        return 0;
    }
}
