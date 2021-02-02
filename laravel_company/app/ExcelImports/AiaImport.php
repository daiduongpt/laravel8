<?php


namespace App\ExcelImports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AiaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        return $collection;
    }
}
