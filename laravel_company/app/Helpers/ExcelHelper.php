<?php
namespace App\Helpers\Utility;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class ExcelHelper {
    /**
     * Parse data from uploaded file object
     *
     * @param UploadedFile $uploadedFile
     * @param array $headerFields
     * Example header fields
     * [
     *      'user_name',
     *      'phone',
     *      'email'
     * ]
     *
     * @return array
     *
     */
    public static function parseDataFromUploadedFile(UploadedFile $uploadedFile, $headerFields = [])
    {
        Excel::load($uploadedFile, function ($reader) use (&$rows, $headerFields) {
            if (!empty($headerFields)) {
                $rows = $reader->select($headerFields)->get();
            } else {
                $rows = $reader->get();
            }
        });

        return $rows->isNotEmpty() ? $rows->toArray() : [];
    }
}
