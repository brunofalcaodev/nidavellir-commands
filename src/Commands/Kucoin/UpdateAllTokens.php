<?php

namespace Nidavellir\Commands\Commands\Kucoin;

use Illuminate\Console\Command;
use Nidavellir\Apis\Kucoin;
use Nidavellir\Trading\Importers\TokenImporter;

class UpdateAllTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kucoin:update-all-tokens';

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
        $data = Kucoin::asSystem()
                      ->allTokens();

        foreach ($data->response()['ticker'] as $token) {
            $pair = explode('-', $token['symbol']);
            TokenImporter::import([
                'symbol' => $pair[0],
                'quote' => $pair[1], ]);
        }

        return 0;
    }
}
