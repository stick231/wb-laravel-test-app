<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class PaginatedApiFetcher{

    public function paginateData(string $uri, string $dateFrom, string $dateTo, string $key, int $limit = 0)
    {
        $page = 1;
        $allData = [];

        $dateFrom = Carbon::parse($dateFrom)->format('Y-m-d');
        $dateTo = $dateTo !== "" ? Carbon::parse($dateTo)->format('Y-m-d') : $dateTo;
        
        $request = $uri . "?dateFrom=" . $dateFrom . "&dateTo=" . $dateTo .  "&key=" . $key;
        if($limit !== 0){
            $request .= "&limit=" . $limit;
        }

        while(true){
            $response = Http::get($request . "&page=" . $page)->json();
            if(empty($response)){
                break;
            }
            $data = $response['data'] ?? [];

            $allData = array_merge($allData, $data);
            $page++;
        }

        return $allData;
    }
}
