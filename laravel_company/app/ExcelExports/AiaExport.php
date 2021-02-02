<?php


namespace App\ExcelExports;


use Maatwebsite\Excel\Concerns\FromCollection;

class AiaExport implements FromCollection
{
    public function collection()
    {
        return collect([132]);
    }
}
