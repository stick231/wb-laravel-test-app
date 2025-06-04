<?php

namespace App\Console\Commands;

use App\Models\Stock;
use App\Services\PaginatedApiFetcher;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(PaginatedApiFetcher $paginatedApiFetcher)
    {
        $this->info("Importing stocks....");

        $dateFrom = Carbon::yesterday("Europe/Moscow");

        $paginatedApiFetcher->paginateData("http://109.73.206.144:6969/api/stocks", $dateFrom, "", env('api_key'), 'stocks');

        $this->info("Stocks imported successfully!");
    }
}
