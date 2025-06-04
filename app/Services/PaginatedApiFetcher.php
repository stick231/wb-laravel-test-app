<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaginatedApiFetcher{

    protected $modelPathArray = [
        'incomes' => 'App\Models\Income',
        'orders' => 'App\Models\Order',
        'sales' => 'App\Models\Sale',
        'stocks' => 'App\Models\Stock'
    ];

    public function paginateData(string $uri, string $dateFrom, string $dateTo, string $key, string $table, int $limit = 0)
    {
        $page = 1;

        $dateFrom = Carbon::parse($dateFrom)->format('Y-m-d');
        $dateTo = $dateTo !== "" ? Carbon::parse($dateTo)->format('Y-m-d') : $dateTo;
        
        $request = $uri . "?dateFrom=" . $dateFrom . "&dateTo=" . $dateTo .  "&key=" . $key;
        if($limit !== 0){
            $request .= "&limit=" . $limit;
        }

        $modelPath = $this->modelPathArray[$table];
        $model = app($modelPath);

        while(true){
            $response = Http::get($request . "&page=" . $page)->json();

            if(empty($response)){
                break;
            }
            //добавить проверку count$data чтобы не было много пустых страниц
            try{
                $data = $response['data'] ?? [];
                $model->insert($data);

                Log::info('Insert successful', ['table' => $table, 'rows' => count($data), 'page' => $page]);
                $page++;
            } catch(\Exception $e){
                Log::info($e);
                break;
            }
        }
    }
}
