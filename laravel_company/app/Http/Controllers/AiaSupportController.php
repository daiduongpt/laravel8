<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AiaSupportController
{
    public function index()
    {
        try {
            $stdClass = new \stdClass();

            $data = Excel::toCollection($stdClass, public_path('/excels/file.xlsx'));
            $data = $data->all();
            $dataFilter = $data[0]->filter(function ($item) {
                $arr = $item->toArray();

               return !empty(array_filter($arr));
            });

            $dataArr = $dataFilter->toArray();
            unset($dataArr[0]);

            $response = '';
            foreach ($dataArr as $item) {
                $response .= '"' . $item[2] . '", ';
            }

            echo "SELECT `group`.link, campaign_info_user.Po_id
FROM `gotit`.`group`
JOIN `gotit`.campaign_info_user ON campaign_info_user.evoucher_id = group.group_id
WHERE campaign_info_user.code IN ({$response})";

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
