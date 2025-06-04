<?php

namespace App\Console\Commands;

use App\Models\Income;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\PaginatedApiFetcher;

class ImportIncomes extends Command
{
    public $data = [];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-incomes';

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
        $this->info("Importing incomes...");

        $paginatedApiFetcher->paginateData("http://109.73.206.144:6969/api/incomes", "2020-10-01", "2025-10-01", env('api_key'), 'incomes');

        $this->info("Incomes imported successfully!");
    }
}
