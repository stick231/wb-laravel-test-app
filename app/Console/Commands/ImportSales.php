<?php

namespace App\Console\Commands;

use App\Models\Sales;
use App\Services\PaginatedApiFetcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-sales';

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
        $this->info("Importing sales....");

        $data = $paginatedApiFetcher->paginateData("http://109.73.206.144:6969/api/sales", "2020-10-10", "2025-10-10", env('api_key'));

        if(!empty($data)){
            echo count($data);
            Sales::insert($data);
        }

        $this->info("Sales imported successfully!");
    }
}
