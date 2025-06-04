<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\PaginatedApiFetcher;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-orders';

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
        $this->info("Importing orders....");

        $data = $paginatedApiFetcher->paginateData("http://109.73.206.144:6969/api/orders", "2020-10-10", "2025-10-10", env('api_key'));

        if(!empty($data)){
            Order::insert($data);
        }
        $this->info("Orders imported successfully!");
    }
}
