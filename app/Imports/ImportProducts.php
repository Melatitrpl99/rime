<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProducts implements ToModel, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        // dd($row);
        return new Product([
            'nama' => $row[0],
            'harga_customer' => $row[1]
        ]);
    }
}
